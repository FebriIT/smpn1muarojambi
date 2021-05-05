<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\Agenda;
use App\Berita;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $countpengumuman = Pengumuman::all()->count();
        $countagenda = Agenda::all()->count();
        $countberita = Berita::all()->count();
        $lastuser = User::orderBy('created_at', 'desc')->paginate(8);
        return view('dashboard', compact('countpengumuman', 'countagenda', 'countberita', 'lastuser'));
    }
}
