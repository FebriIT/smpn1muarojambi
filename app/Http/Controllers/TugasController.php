<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Mapel;
use App\Kelas;

class TugasController extends Controller
{
    public function index()
    {
        $data = Tugas::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('tugas.index', compact('data', 'mapel', 'kelas'));
    }
}
