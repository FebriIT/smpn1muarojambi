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
        $data = Materi::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
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
        $data->user_id = auth()->user()->id;
        $nmkelas = Kelas::find($request->kelas_id)->nama_kelas;

        // $email = auth()->user()->email;
        // folder materi sesuai nama
        // delete guru hapus folder materi
        if ($request->has('file_materi')) {
            $file = $request->file('file_materi');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $request->file('file_materi')->move(public_path() . '/storage/materi/' . auth()->user()->name . '/' . $nmkelas, $filename);
            $data->file_materi = $filename;
            $data->save();
        } else {
            $data->save();
        }
        return redirect()->back()->with('success', 'Data Berhasil Ditambah');
    }

    public function hapus($id)
    {
        $data = Materi::find($id);
        // $email = auth()->user()->email;
        // dd($email);
        $nmkelas = Kelas::find($data->kelas_id)->nama_kelas;

        $image_path = '/public/materi/' . $data->user->name . '/' . $nmkelas . '/' . $data->file_materi;

        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function getDownload($file_materi)
    {

        $data = Materi::where('file_materi', $file_materi)->first();
        $nmuser = $data->user->name;
        $nmkelas = $data->kelas->nama_kelas;
        return  response()->download(public_path() . '/storage/materi/' . $nmuser . '/' . $nmkelas . '/' . $file_materi);
    }
}
