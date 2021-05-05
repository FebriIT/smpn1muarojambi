<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Berita;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::orderBy('created_at', 'desc')->get();
        return view('kategori.index', ['data' => $data]);
    }

    public function tambah(Request $request)
    {
        $data = new Kategori;
        $data->kategori_nama = $request->kategori_nama;
        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil Dibuat');
    }

    public function hapus($id)
    {
        $data = Kategori::where('id', $id);
        Berita::where('kategori_id', $id)->delete();
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();
            Kategori::where(['id' => $id])
                ->update(['kategori_nama' => $data['kategori_nama']]);


            return redirect()->back()->with('toast_success', 'Data Berhasil Diupdate');
        }
    }
}
