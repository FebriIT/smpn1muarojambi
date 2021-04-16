<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;
use App\Siswa;

class ProfileController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'guru') {
            $idguru = auth()->user()->guru->id;
            $data = Guru::find($idguru);

            return view('profile.guru', compact('data'));
        } elseif (auth()->user()->role == 'siswa') {
            $id_siswa = auth()->user()->siswa->id;
            $data = Siswa::find($id_siswa);

            return view('profile.siswa', compact('data'));
        }
    }

    public function update($id, Request $req)
    {
        $data = Guru::find($id);
        user::where(['id' => $data->user_id])
            ->update(['name' => $req->nama_guru]);



        if ($data->avatar == null) {
            if ($req->has('avatar')) {


                $req->file('avatar')->move('images/guru/', $req->file('avatar')->getClientOriginalName());
                $data->avatar = $req->file('avatar')->getClientOriginalName();
                $data->save();
            }
        } else {
            if ($req->has('avatar')) {
                //   ini untuk update profile

                unlink('images/guru/' . $data->avatar);

                $req->file('avatar')->move('images/guru/', $req->file('avatar')->getClientOriginalName());
                $data->avatar = $req->file('avatar')->getClientOriginalName();
                $data->save();
            }
        }

        $data->update(['nip_guru' => $req->nip_guru, 'nama_guru' => $req->nama_guru, 'tanggal_lahir' => $req->tanggal_lahir, 'no_hp' => $req->no_hp]);
        return redirect()->back()->with('toast_success', 'Data Berhasil diubah');
    }

    public function changepassword(Request $req)
    {
        $id = auth()->user()->id;
        $data = User::find($id);
        $data->password = bcrypt($req->password);
        $data->save();


        return redirect()->back()->with('toast_success', 'Password Berhasil diubah');
    }
}
