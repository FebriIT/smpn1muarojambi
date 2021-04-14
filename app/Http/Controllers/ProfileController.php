<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class ProfileController extends Controller
{
    public function index()
    {
        $idguru = auth()->user()->guru->id_guru;
        $data = Guru::find($idguru);

        return view('profile.index', compact('data'));
    }
}
