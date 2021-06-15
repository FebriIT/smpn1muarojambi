<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;
use App\User;
use App\Kelas;
use App\Tugas;
use App\SoalEssay;
use App\SoalPilihanGanda;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $data = Guru::orderBy('id', 'desc')->get();
        $mapel = Mapel::all();
        $mapel1 = Mapel::all();
        return view('guru.index', compact('data', 'mapel', 'mapel1'));
    }
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nip_guru' => 'required|integer|min:5|unique:guru',
            'nama_guru' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'mapel_id' => 'required',
            'avatar' => 'max:500'
        ]);
        // insert table user
        $user = new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama_guru;
        $user->email = $request->email;
        $user->password = bcrypt('guru123');
        $user->remember_token = Str::random(60);
        $user->save();

        // insert table siswa
        $request->request->add(['user_id' => $user->id]);

        $guru = \App\Guru::create($request->all());

        if ($request->has('avatar')) {


            $request->file('avatar')->move(public_path() . '/storage/guru/' . $request->email, $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }


        return redirect()->back()->with('success', 'Data Berhasil Dibuat');
    }

    public function edit(Request $request, $id)
    {



        $guru = Guru::find($id);
        $iduser = $guru->user_id;
        $user = user::find($iduser);
        if ($request->password) {
            $join = $this->validate($request, [
                'password' => 'min:6',

            ]);
            $user->password = bcrypt($request->password);
            $user->save();
        }
        $user->update(['name' => $request->nama_guru]);

        $guru->update($request->all());

        return redirect()->back()->with('toast_success', 'Data Berhasil diubah');
    }

    public function hapus($id)
    {

        $guru = \App\Guru::find($id);
        $image_path = '/public/guru/' . $guru->user->email . '/' . $guru->avatar;

        if (Storage::exists($image_path)) {

            Storage::deleteDirectory('/public/guru/' . $guru->user->email);
        }
        $user = \App\User::find($guru->user_id);
        // materi
        $materi = \App\Materi::where('user_id', $guru->user_id)->first();
        if ($materi != null) {
            $nmkelas = Kelas::find($materi->kelas_id)->nama_kelas;
            $image_path = '/public/materi/' . $materi->user->name . '/' . $nmkelas . '/' . $materi->file_materi;
            if (Storage::exists($image_path)) {

                Storage::deleteDirectory('/public/materi/' . $materi->user->name);
            }
            $materi->delete();
        }

        // // end materi

        $user->delete();
        // // hapus tugas
        $tugas = Tugas::where('guru_id', $id)->get();

        // // dd($tugas);
        if ($tugas != null) {
            foreach ($tugas as $row) {
                $row->kelas()->detach();
                $soalpilgan = SoalPilihanGanda::where('tugas_id', $row->id)->delete();
                $soalessay = SoalEssay::where('tugas_id', $row->id)->delete();
                $row->delete();
            }
        }


        // end hapus tugas
        $guru->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
