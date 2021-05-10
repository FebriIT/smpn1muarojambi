<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;

class PengaturanController extends Controller
{
    public function index()
    {
        $data = Pengaturan::all();
        $tentangkami = Pengaturan::where('id', 1)->first();
        return view('pengaturan.index', compact('data', 'tentangkami'));
    }
    public function tentangkami(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(1)->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        return redirect()->back()->with('success', 'Tentang Kami Berhasil Diubah');
    }
}
