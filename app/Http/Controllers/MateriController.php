<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Mapel;
use App\Kelas;
use Illuminate\Support\Facades\Storage;

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
        $data = new Materi;
        $data->materi = $request->materi;
        $data->mapel_id = $request->mapel_id;
        $data->deskripsi = $request->deskripsi;
        $data->kelas_id = $request->kelas_id;
        $data->link_materi = $request->link_materi;
        $data->author = auth()->user()->name;
        $email = auth()->user()->email;
        if ($request->has('file_materi')) {
            $request->file('file_materi')->move(public_path() . '/storage/materi/' . $email, $request->file('file_materi')->getClientOriginalName());
            $data->file_materi = $request->file('file_materi')->getClientOriginalName();
            $data->save();
        } else {
            $data->save();
        }
        return redirect()->back()->with('success', 'Data Berhasil Ditambah');
    }

    public function hapus($id)
    {
        $data = Materi::find($id);
        $email = auth()->user()->email;
        // dd($email);
        $image_path = '/public/materi/' . $email . '/' . $data->file_materi;

        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
