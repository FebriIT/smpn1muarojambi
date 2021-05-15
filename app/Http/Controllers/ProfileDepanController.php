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
        return view('profiledepan.sosialmedia');
    }
    public function administrasikantorsekolah()
    {
        return view('profiledepan.admkantorsekolah');
    }
    public function perpustakaan()
    {
        return view('profiledepan.perpustakaan');
    }
    public function labkomputer()
    {
        return view('profiledepan.labkomputer');
    }
    public function guru()
    {
        $data = Guru::all();
        return view('profiledepan.guru', compact('data'));
    }
}
