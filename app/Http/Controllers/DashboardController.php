<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\Agenda;
use App\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        $countpengumuman=Pengumuman::all()->count();
        $countagenda=Agenda::all()->count();
        $countberita=Berita::all()->count();
        return view('dashboard',compact('countpengumuman','countagenda','countberita'));
    }
}
