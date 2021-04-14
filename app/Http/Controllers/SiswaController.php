<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Siswa;
use App\Kelas;
use App\User;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('id_siswa', 'desc')->get();
        $kelas = Kelas::all();
        $kelas1 = Kelas::all();

        return view('siswa.index', compact('data', 'kelas', 'kelas1'));
    }
    public function tambah(Request $request)
    {
        //validasi saat error pas tambah tada

        $this->validate($request, [
            'nisn' => 'required|min:5|unique:siswa',
            'email' => 'required|email|unique:users',
            'avatar' => 'max:500',
        ]);

        //insert table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password = bcrypt('siswa123');
        $user->remember_token = str_random(60);
        $user->save();

        $namakelas = Kelas::where('id_kelas', $request->kelas_id)->first()->nama_kelas;
        // dd($namakelas);
        //insert table siswa
        $request->request->add(['user_id' => $user->id, 'kelas_nama' => $namakelas]);


        $siswa = \App\Siswa::create($request->all());
        if ($request->has('avatar')) {
            //   ini untuk update profile
            // unlink('images/guru/'. $guru->avatar);

            $request->file('avatar')->move('images/siswa/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dibuat');
    }
    public function hapus($id, Request $request)
    {
        $siswa = \App\Siswa::find($id);
        $image_path = "images/siswa/" . $siswa->avatar;  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $user = \App\User::find($siswa->user_id);
        $user->delete();
        $siswa->delete();

        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function edit($id, Request $request)
    {

        $siswa = Siswa::find($id);
        user::where(['id' => $siswa->user_id])
            ->update(['name' => $request->nama_siswa]);
        $namakelas = Kelas::where('id_kelas', $request->kelas_id)->first()->nama_kelas;
        $siswa->kelas_nama = $namakelas;
        $siswa->update($request->all());
        return redirect()->back()->with('toast_success', 'Data Berhasil diubah');
    }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'nisn' => 'required|integer|min:5|unique:siswa',
    //         'email' => 'required|email|unique:users',
    //         'avatar' => 'mimes:jpg,png|size:>200',

    //     ]);

    //     $siswa = \App\Siswa::find($id);
    //     $siswa->update($request->all());
    //     if ($request->has('avatar')) {

    //         $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
    //         $siswa->avatar = $request->file('avatar')->getClientOriginalName();
    //         $siswa->save();
    //     }
    //     if (auth()->user()->role == 'admin') {
    //         return redirect('/admin/siswa')->with('sukses', 'Data Berhasil Diupdate');
    //     } elseif (auth()->user()->role == 'guru') {
    //         return redirect('/guru/siswa')->with('sukses', 'Data Berhasil Diupdate');
    //     }
    // }



    // public function profile($id)
    // {
    //     $siswa = \App\Siswa::find($id);
    //     return view('siswa.profile', ['siswa' => $siswa]);
    // }
}
