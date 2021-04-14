<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $idguru = auth()->user()->guru->id_guru;
        $data = Guru::find($idguru);

        return view('profile.index', compact('data'));
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
}
