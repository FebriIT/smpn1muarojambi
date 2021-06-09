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
use App\Timeline;

class DashboardController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all()->count();
        if (auth()->user()->role == 'admin') {
            $materi = Materi::orderBy('id', 'desc')->count();
        } else {

            $materi = Materi::where('user_id', auth()->user()->id)->count();
        }
        $guru = Guru::all()->count();
        $siswa = Siswa::all()->count();
        $mapel = Mapel::all()->count();
        $kelas = Kelas::all()->count();
        $countpengumuman = Pengumuman::all()->count();
        $countagenda = Agenda::all()->count();
        $countberita = Berita::all()->count();
        $countuser = User::all()->count();
        $lastuser = User::orderBy('created_at', 'desc')->paginate(8);
        $timeline = Timeline::orderBy('id', 'desc')->get();
        return view('dashboard', compact('timeline', 'countpengumuman', 'countagenda', 'countberita', 'lastuser', 'countuser', 'guru', 'siswa', 'mapel', 'kelas', 'materi', 'tugas'));
    }
}
