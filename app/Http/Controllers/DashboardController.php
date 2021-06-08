<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\Agenda;
use App\Berita;
use App\User;
use App\Guru;
use App\Siswa;
use App\Mapel;
use App\Kelas;
use App\Materi;
use App\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all()->count();
        $materi = Materi::all()->count();
        $guru = Guru::all()->count();
        $siswa = Siswa::all()->count();
        $mapel = Mapel::all()->count();
        $kelas = Kelas::all()->count();
        $countpengumuman = Pengumuman::all()->count();
        $countagenda = Agenda::all()->count();
        $countberita = Berita::all()->count();
        $countuser = User::all()->count();
        $lastuser = User::orderBy('created_at', 'desc')->paginate(8);
        return view('dashboard', compact('countpengumuman', 'countagenda', 'countberita', 'lastuser', 'countuser', 'guru', 'siswa', 'mapel', 'kelas', 'materi', 'tugas'));
    }
}
