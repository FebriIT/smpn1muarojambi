<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Materi;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();

        return view('kelas.index', compact('data'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
        ]);
        Kelas::create($request->all());

        if (auth()->user()->role == 'admin') {
            return redirect()->back()->with('success', 'Data Berhasil Dibuat');
        } elseif (auth()->user()->role == 'guru') {

            return redirect()->back()->with('success', 'Data Berhasil Dibuat');
        }
    }
    public function hapus($id)
    {
        $data = Kelas::find($id);
        $data->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function open($id)
    {
        $data = Kelas::find($id);
        $datasiswa = $data->siswa;
        $datatugas = $data->tugas;
        $materi = Materi::where('kelas_id', $id)->orderBy('id', 'desc')->get();


        return view('kelas.open', compact('data', 'datasiswa', 'materi', 'datatugas'));
    }

    public function opensiswa()
    {
        $id = auth()->user()->siswa->kelas_id;
        $data = Kelas::find($id);
        $datasiswa = $data->siswa;
        $datatugas = $data->tugas;

        $materi = Materi::where('kelas_id', $id)->orderBy('id', 'desc')->get();
        return view('kelas.open', compact('datasiswa', 'materi', 'datatugas'));
    }
}
