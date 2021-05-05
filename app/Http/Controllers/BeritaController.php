<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class BeritaController extends Controller
{
    public function index()
    {

        $data = Berita::orderBy('id', 'desc')->get();

        return view('berita.listberita', compact('data'));
    }

    public function postberita()
    {
        $kategori = Kategori::all();
        $data = Berita::all();
        return view('berita.postberita', compact('kategori'));
    }

    public function tambah(Request $request)
    {

        $data = new Berita;
        $data->berita_judul = $request->berita_judul;
        $data->berita_isi = $request->berita_isi;
        $idkategori = $data->kategori_id = $request->kategori_id;

        $data->user_id = auth()->user()->id;

        $data->berita_gambar = $request->berita_gambar;
        // dd($data);
        $data->save();
        // $datas = \App\Berita::create($request->all());
        if ($request->has('berita_gambar')) {

            $request->file('berita_gambar')->move('images/berita/', $request->file('berita_gambar')->getClientOriginalName());
            $data->berita_gambar = $request->file('berita_gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('admin/listberita')->with('success', 'Berita Berhasil Dipublish');
    }
    public function edit($id)
    {
        $kategori = Kategori::all();
        $data = Berita::find($id);
        return View('berita/editberita', compact('data', 'kategori'));
    }
    public function update(Request $request, $id)
    {
        $data = Berita::find($id);
        $data->update($request->all());
        if ($request->has('berita_gambar')) {
            //   ini untuk update profile
            unlink('images/berita/' . $data->berita_gambar);

            $request->file('berita_gambar')->move('images/berita/', $request->file('berita_gambar')->getClientOriginalName());
            $data->avatar = $request->file('berita_gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('admin/listberita')->with('toast_success', 'Data Berhasil Diupdate');
    }

    public function singlepost($slug)
    {
        $kategori = Kategori::all();
        $populer = Berita::orderBy('berita_views', 'desc')->get();
        $post = Berita::where('berita_slug', '=', $slug)->first();
        $idberita = $post->id;
        Berita::find($idberita)->increment('berita_views');

        return view('berita.singlepost', compact('post', 'kategori', 'populer'));
        // dd($post);
    }

    public function kategoriberita($kategori_nama)
    {

        $kategori = Kategori::where('kategori_nama', $kategori_nama)->first();
        $idkategori = $kategori->id;

        // $data = DB::select('SELECT * FROM `berita` join kategori on kategori.id=berita.kategori_id WHERE kategori_id=?', [$idkategori]);
        $data = Berita::where('kategori_id', $idkategori)->get();
        // dd($data1);
        $datakategori = Kategori::all();

        $kategori = Kategori::all();
        $populer = Berita::orderBy('berita_views', 'desc')->get();



        // $post=Berita::where('berita_slug','=',$slug)->first();
        return view('berita.kategoriberita', compact('data', 'datakategori', 'kategori', 'populer'));
    }

    public function halamandepan()
    {
        $data = Berita::all();
        $kategori = Kategori::all();
        $populer = Berita::orderBy('berita_views', 'desc')->get();
        return view('berita.halamandepan', compact('data', 'populer', 'kategori'));
    }

    public function hapus($id)
    {
        $data = Berita::find($id);

        $image_path = "images/berita/" . $data->berita_gambar;  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        } else {
            $data->delete();

            return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus Tetapi Gambar Tidak ada');
        }
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
