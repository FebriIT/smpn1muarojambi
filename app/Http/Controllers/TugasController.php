<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Mapel;
use App\Kelas;
use App\SoalPilihanGanda;
use App\SoalEssay;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $data = Tugas::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('tugas.index', compact('data', 'mapel', 'kelas'));
    }

    public function tambah(Request $request)
    {
        $request->request->add(['guru_id' => auth()->user()->guru->id]);
        $tugas = Tugas::create($request->all());
        $tugas->kelas()->attach($request->kelas);
        return redirect()->back()->with('success', 'Data Berhasil Dibuat');
    }

    public function hapus($id)
    {
        $data_tugas = Tugas::find($id);
        $data_tugas->kelas()->detach();
        $soalpilgan = SoalPilihanGanda::where('tugas_id', $id)->delete();
        $soalessay = SoalEssay::where('tugas_id', $id)->delete();
        $data_tugas->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function open($id)
    {
        $data = Tugas::find($id);
        $soalpilgan = SoalPilihanGanda::where('tugas_id', $id)->orderBy('id', 'desc')->get();
        $soalessay = SoalEssay::where('tugas_id', $id)->orderBy('id', 'desc')->get();
        // $soal = Soal::all();
        // $soalessay = SoalEssay::all();

        return view('tugas.open', compact('data', 'soalpilgan', 'soalessay', 'id'));
    }

    public function tambahpilgan(Request $request, $id)
    {
        $data = new SoalPilihanGanda;
        $data->tugas_id = $id;
        $data->soal = $request->soal;
        $data->a = $request->pilA;
        $data->b = $request->pilB;
        $data->c = $request->pilC;
        $data->d = $request->pilD;
        $data->kunci = $request->kunci;
        $data->score = $request->score;
        $data->save();
        return redirect()->back()->with('toast_success', 'Soal Pilihan Ganda Berhasil Dibuat');
    }
    function tambahessay(Request $request, $id)
    {
        $data = new SoalEssay;
        $data->tugas_id = $id;
        $data->soal = $request->soal;
        $data->save();
        return redirect()->back()->with('toast_success', 'Soal Essay Berhasil Dibuat');
    }

    public function hapuspilgan($id)
    {
        $data = SoalPilihanGanda::find($id)->delete();
        return redirect()->back()->with('toast_success', 'Soal Berhasil Dihapus');
    }
    public function hapusessay($id)
    {
        $data = SoalEssay::find($id)->delete();
        return redirect()->back()->with('toast_success', 'Soal Berhasil Dihapus');
    }
    public function takesoal($id)
    {
        $tugas = Tugas::find($id);

        return view('tugas.takesoal', compact('tugas'));
    }

    public function soal($id)
    {
        $tugas = Tugas::find($id);
        // $data = $tugas->soal->shuffle()->all();
        $data = $tugas->soalpilihanganda->all();
        return view('tugas.soal', ['tugas' => $tugas, 'data' => $data]);
    }
}
