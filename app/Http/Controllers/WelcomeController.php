<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\Agenda;
use App\Berita;
use App\Guru;
use App\Siswa;


class WelcomeController extends Controller
{
    public function index()
    {
        $countguru = Guru::all()->count();
        $countsiswa = Siswa::all()->count();
        $countpengumuman = Pengumuman::all()->count();
        $countagenda = Agenda::all()->count();

        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->paginate(3);
        $agenda = Agenda::orderBy('created_at', 'desc')->paginate(3);
        $berita = Berita::orderBy('created_at', 'desc')->paginate(4);

        return view('welcome', compact(['pengumuman', 'agenda', 'berita', 'countguru', 'countsiswa', 'countpengumuman', 'countagenda']));
    }
    // public function pengumumanpost($slug)
    // {
    //     $pengumuman=Pengumuman::all();
    //     return view('welcome',compact(['pengumuman']));
    // }
}
