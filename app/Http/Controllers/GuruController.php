<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    public function index()
    {
        $data = Guru::orderBy('id_guru', 'desc')->get();

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


        $namamapel = Mapel::where('mapel_id', $request->mapel_id)->first()->mapel_nama;
        // insert table siswa
        $request->request->add(['user_id' => $user->id, 'mapel_nama' => $namamapel]);

        $guru = \App\Guru::create($request->all());
        if ($request->has('avatar')) {
            //   ini untuk update profile
            // unlink('images/guru/'. $guru->avatar);

            $request->file('avatar')->move('images/guru/', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dibuat');
    }

    public function edit(Request $request, $id)
    {



        $guru = Guru::find($id);
        user::where(['id' => $guru->user_id])
            ->update(['name' => $request->nama_guru]);
        $namamapel = Mapel::where('mapel_id', $request->mapel_id)->first()->mapel_nama;
        $guru->mapel_nama = $namamapel;
        $guru->update($request->all());
        // insert table siswa

        // $request->request->add(['user_id' => $user->id, 'mapel_nama' => $namamapel]);



        return redirect()->back()->with('toast_success', 'Data Berhasil diubah');
    }

    public function hapus($id)
    {

        $guru = \App\Guru::find($id);
        $image_path = "images/guru/" . $guru->avatar;  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $user = \App\User::find($guru->user_id);
        $user->delete();
        $guru->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
