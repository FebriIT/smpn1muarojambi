<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function halamandepan()
    {
        $data = Gallery::orderBy('id', 'desc')->get();
        return view('gallery.halamandepan', compact('data'));
    }
    public function index()
    {
        $data = Gallery::orderBy('id', 'desc')->get();
        return view('gallery.index', compact('data'));
    }

    public function tambah(Request $request)
    {
        $data = new Gallery;
        $data->author = auth()->user()->name;
        if (File::exists(public_path() . '/storage/gallery/' . $request->file('foto')->getClientOriginalName())) {
            if (auth()->user()->role == 'admin') {

                return redirect()->back()->with('toast_error', 'Nama File Sudah ada');
            }
        } else {

            if ($request->has('foto')) {
                $file = $request->file('foto');
                $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
                // dd($filename);
                $request->file('foto')->move(public_path() . '/storage/gallery/', $filename);
                $data->foto = $filename;
                $data->save();
            }

            return redirect()->back()->with('toast_success', 'Data Berhasil Ditambah');
        }
    }
    public function hapus($id)
    {
        $data = Gallery::find($id);
        $foto = public_path() . "/storage/gallery/" . $data->foto;
        if (File::exists($foto)) {
            File::delete($foto);
        } else {
            $data->delete();

            return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus Tetapi Gambar Tidak ada');
        }
        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
