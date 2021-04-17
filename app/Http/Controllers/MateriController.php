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
        if ($request->has('file_materi')) {
            //   ini untuk update profile
            // unlink('images/guru/'. $guru->avatar);

            $request->file('file_materi')->move('file/materi/', $request->file('file_materi')->getClientOriginalName());
            $data->file_materi = $request->file('file_materi')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Data Berhasil Ditambah');
    }

    public function hapus($id)
    {
        $data = Materi::find($id);
        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
