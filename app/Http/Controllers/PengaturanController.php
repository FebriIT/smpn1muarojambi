<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $data = Pengaturan::all();
        $tentangkami = Pengaturan::where('id', 1)->first();
        $visimisi = Pengaturan::where('id', 2)->first();


        return view('pengaturan.index', compact('data', 'tentangkami', 'visimisi'));
    }
    public function tentangkami(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(1)->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        return redirect()->back()->with('success', 'Tentang Kami Berhasil Diubah');
    }
    public function visimisi(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(2);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        // $exists = Storage::disk('s3')->exists('file.jpg');
        // dd(Storage::exists('public/pengaturan/bg5.jpeg'));

        if ($req->has('gambar')) {
            //   ini untuk update profile
            if (Storage::exists('public/pengaturan/' . $data->gambar)) {
                // unlink('images/pengaturan/' . $data->gambar);
                Storage::delete('public/pengaturan/' . $data->gambar);
            }

            $req->file('gambar')->move('storage/pengaturan/', $req->file('gambar')->getClientOriginalName());
            $data->gambar = $req->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Tentang Kami Berhasil Diubah');
    }
}
