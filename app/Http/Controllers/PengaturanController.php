<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $data = Pengaturan::all();
        $tentangkami = Pengaturan::where('id', 1)->first();
        $visimisi = Pengaturan::where('id', 2)->first();
        $sejarah = Pengaturan::where('id', 3)->first();
        $sosialmedia = Pengaturan::where('id', 4)->first();
        $admsklh = Pengaturan::where('id', 5)->first();
        $perpustakaan = Pengaturan::where('id', 6)->first();
        $labkom = Pengaturan::where('id', 7)->first();
        $struktur = Pengaturan::where('id', 8)->first();


        return view('pengaturan.index', compact('data', 'struktur', 'tentangkami', 'visimisi', 'sejarah', 'sosialmedia', 'admsklh', 'perpustakaan', 'labkom'));
    }
    public function struktur(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(8);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        if ($req->has('gambar')) {
            //   ini untuk update profile
            // dd();
            if (file_exists(str_replace('\\', '/', public_path()) . '/storage/pengaturan/strukturorganisasi/' . $data->gambar)) {
                unlink(public_path() . '/storage/pengaturan/strukturorganisasi/' . $data->gambar);
            }

            $req->file('gambar')->move(public_path() . '/storage/pengaturan/strukturorganisasi', $req->file('gambar')->getClientOriginalName());
            $data->gambar = $req->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Struktur Organisasi Berhasil Diubah');
    }
    public function tentangkami(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(1);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        if ($req->has('gambar')) {
            //   ini untuk update profile
            // dd();
            if (file_exists(str_replace('\\', '/', public_path()) . '/storage/pengaturan/tentangkami/' . $data->gambar)) {
                unlink(public_path() . '/storage/pengaturan/tentangkami/' . $data->gambar);
            }

            $req->file('gambar')->move(public_path() . '/storage/pengaturan/tentangkami', $req->file('gambar')->getClientOriginalName());
            $data->gambar = $req->file('gambar')->getClientOriginalName();
            $data->save();
        }

        return redirect()->back()->with('success', 'Tentang Kami Berhasil Diubah');
    }
    public function visimisi(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(2);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        // $exists = Storage::disk('s3')->exists('file.jpg');
        // dd(Storage::exists('public/pengaturan/bg5.jpeg'));

        if ($req->has('gambar')) {
            //   ini untuk update profile
            if (file_exists(str_replace('\\', '/', public_path()) . '/storage/pengaturan/visimisi/' . $data->gambar)) {
                unlink(public_path() . '/storage/pengaturan/visimisi/' . $data->gambar);
            }

            $req->file('gambar')->move(public_path() . '/storage/pengaturan/visimisi', $req->file('gambar')->getClientOriginalName());
            $data->gambar = $req->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Visi & Misi Berhasil Diubah');
    }

    public function sejarah(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(3);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);

        return redirect()->back()->with('success', 'Sejarah Berhasil Diubah');
    }

    public function sosialmedia(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(4);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);

        return redirect()->back()->with('success', 'Sosial Media Berhasil Diubah');
    }
    public function admsklh(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(5);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);

        return redirect()->back()->with('success', 'Administrasi Sekolah Berhasil Diubah');
    }

    public function perpustakaan(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(6);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        // $exists = Storage::disk('s3')->exists('file.jpg');
        // dd(Storage::exists('public/pengaturan/bg5.jpeg'));

        if ($req->has('gambar')) {
            //   ini untuk update profile
            if (file_exists(str_replace('\\', '/', public_path()) . '/storage/pengaturan/perpustakaan/' . $data->gambar)) {
                unlink(public_path() . '/storage/pengaturan/perpustakaan/' . $data->gambar);
            }

            $req->file('gambar')->move(public_path() . '/storage/pengaturan/perpustakaan', $req->file('gambar')->getClientOriginalName());
            $data->gambar = $req->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Perpustakaan Berhasil Diubah');
    }

    public function labkom(Request $req)
    {
        // dd($req->all());
        $judul = $req->judul;
        $deskripsi = $req->deskripsi;
        $data = Pengaturan::find(7);
        $data->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        // $exists = Storage::disk('s3')->exists('file.jpg');
        // dd(Storage::exists('public/pengaturan/bg5.jpeg'));

        if ($req->has('gambar')) {
            //   ini untuk update profile
            if (file_exists(str_replace('\\', '/', public_path()) . '/storage/pengaturan/labkom/' . $data->gambar)) {
                unlink(public_path() . '/storage/pengaturan/labkom/' . $data->gambar);
            }

            $req->file('gambar')->move(public_path() . '/storage/pengaturan/labkom', $req->file('gambar')->getClientOriginalName());
            $data->gambar = $req->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'LAB Komputer Berhasil Diubah');
    }
}
