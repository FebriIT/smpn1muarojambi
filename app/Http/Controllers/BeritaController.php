<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class BeritaController extends Controller
{
    public function index()
    {

        $data = Berita::where('author', auth()->user()->name)->orderBy('id', 'desc')->get();

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

        $data->author = auth()->user()->name;

        $data->berita_gambar = $request->berita_gambar;
        // dd($data);


        $kategori = Kategori::find($request->kategori_id);

        if (File::exists(public_path() . '/storage/berita/' . $kategori->kategori_nama . '/' . $request->file('berita_gambar')->getClientOriginalName())) {
            if (auth()->user()->role == 'admin') {

                return redirect('admin/listberita')->with('toast_error', 'Nama File Sudah ada');
            }
        } else {

            if ($request->has('berita_gambar')) {
                $file = $request->file('berita_gambar');
                $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
                // dd($filename);
                $request->file('berita_gambar')->move(public_path() . '/storage/berita/' . $kategori->kategori_nama, $filename);
                $data->berita_gambar = $filename;
                $data->save();
            }
            if (auth()->user()->role == 'admin') {
                return redirect('admin/listberita')->with('success', 'Berita Berhasil Dipublish');
            } elseif (auth()->user()->role == 'guru') {
                return redirect('guru/listberita')->with('success', 'Berita Berhasil Dipublish');
            }
        }
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
        $kategori = Kategori::find($data->kategori_id)->kategori_nama;
        // dd($kategori);
        // dd('storage/berita/' . $kategori . '/' . $data->berita_gambar);
        $data->update(['berita_judul' => $request->berita_judul, 'berita_isi' => $request->berita_isi, 'kategori_id' => $request->kategori_id]);
        if ($request->has('berita_gambar')) {

            Storage::delete('public/berita/' . $kategori . '/' . $data->berita_gambar);
            $file = $request->file('berita_gambar');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            $request->file('berita_gambar')->move(public_path() . '/storage/berita/' . $kategori . '/', $filename);
            $data->berita_gambar = $filename;
            $data->save();
        }
        if (auth()->user()->role == 'admin') {
            return redirect('admin/listberita')->with('toast_success', 'Data Berhasil Diupdate');
        } elseif (auth()->user()->role == 'guru') {
            return redirect('guru/listberita')->with('toast_success', 'Data Berhasil Diupdate');
        }
    }

    public function singlepost($slug)
    {
        $kategori = Kategori::all();
        $populer = Berita::orderBy('berita_views', 'desc')->paginate(5);
        $post = Berita::where('berita_slug', '=', $slug)->first();
        $idberita = $post->id;
        Berita::find($idberita)->increment('berita_views');
        $kategorinama = Berita::find($idberita)->kategori->kategori_nama;


        return view('berita.singlepost', compact('post', 'kategori', 'populer', 'kategorinama'));
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
        $populer = Berita::orderBy('berita_views', 'desc')->paginate(5);



        // $post=Berita::where('berita_slug','=',$slug)->first();
        return view('berita.kategoriberita', compact('data', 'datakategori', 'kategori', 'populer', 'kategori_nama'));
    }

    public function halamandepan()
    {
        $data = Berita::all();
        $kategori = Kategori::all();
        $populer = Berita::orderBy('berita_views', 'desc')->paginate(5);
        return view('berita.halamandepan', compact('data', 'populer', 'kategori'));
    }

    public function hapus($id)
    {
        $data = Berita::find($id);
        $kategori = Kategori::find($data->kategori_id)->kategori_nama;
        // dd($kategori);
        $image_path = public_path() . "/storage/berita/" . $kategori . '/' . $data->berita_gambar;
        // dd(File::exists($image_path)); // Value is not URL but directory file path
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
