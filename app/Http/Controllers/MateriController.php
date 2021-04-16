<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Mapel;
use App\Kelas;

class MateriController extends Controller
{
    public function index()
    {
        $data = Materi::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('materi.index', compact('data', 'mapel', 'kelas'));
    }

    public function tambah(Request $request)
    {
        $data = Materi::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }
}
