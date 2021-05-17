<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Pengaturan;

class ProfileDepanController extends Controller
{
    public function tentangkami()
    {
        $data = Pengaturan::where('id', 1)->first();
        return view('profiledepan.tentangkami', compact('data'));
    }
    public function visimisi()
    {
        $data = Pengaturan::where('id', 2)->first();
        return view('profiledepan.visimisi', compact('data'));
    }
    public function hubungikami()
    {
        return view('profiledepan.hubungikami');
    }
    public function sosialmedia()
    {
        $data = Pengaturan::where('id', 4)->first();
        return view('profiledepan.sosialmedia', compact('data'));
    }
    public function administrasikantorsekolah()
    {
        $data = Pengaturan::where('id', 5)->first();
        return view('profiledepan.admkantorsekolah', compact('data'));
    }
    public function perpustakaan()
    {
        $data = Pengaturan::where('id', 6)->first();
        return view('profiledepan.perpustakaan', compact('data'));
    }
    public function labkomputer()
    {
        $data = Pengaturan::where('id', 7)->first();
        return view('profiledepan.labkomputer', compact('data'));
    }
    public function guru()
    {
        $data = Guru::all();
        return view('profiledepan.guru', compact('data'));
    }
    public function Sejarah()
    {
        $data = Pengaturan::where('id', 3)->first();
        return view('profiledepan.sejarah', compact('data'));
    }
}
