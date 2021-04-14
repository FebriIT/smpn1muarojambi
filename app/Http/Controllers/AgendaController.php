<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $data=Agenda::orderBy('created_at','desc')->get();
        return view('agenda.index',['data'=>$data]);
    }

    public function tambah(Request $request)
    {
        $data=new Agenda;
        $data->agenda_nama=$request->nama_agenda;
        $data->agenda_deskripsi=$request->deskripsi_agenda;
        $data->agenda_mulai=$request->mulai_agenda;
        $data->agenda_selesai=$request->selesai_agenda;
        $data->agenda_tempat=$request->tempat_agenda;
        $data->agenda_waktu=$request->waktu_agenda;
        $data->agenda_keterangan=$request->keterangan;
        $data->agenda_author=auth()->user()->name;
        $data->save();

        return redirect()->back()->with('success','Agenda Berhasil Dibuat');
    }

    public function hapus($id)
    {
        $data=Agenda::where('agenda_id',$id);
        $data->delete();

        return redirect()->back()->with('toast_success','Data Berhasil Dihapus');
    }

    public function edit(Request $request,$id)
    {
        if($request->isMethod('post')){

            $data=$request->all();
            Agenda::where(['agenda_id'=>$id])
            ->update(['agenda_nama'=>$data['nama_agenda'],
            'agenda_deskripsi'=>$data['deskripsi_agenda'],
            'agenda_mulai'=>$data['mulai_agenda'],
            'agenda_selesai'=>$data['selesai_agenda'],
            'agenda_tempat'=>$data['tempat_agenda'],
            'agenda_waktu'=>$data['waktu_agenda'],
            'agenda_keterangan'=>$data['keterangan'],]);
            
    
            return redirect()->back()->with('toast_success','Data Berhasil Diupdate');
        }
    }


    //  function public

    public function halamandepan()
    {
        $data=Agenda::orderBy('created_at','desc')->paginate(10);
        return view('agenda.halamandepan',['data'=>$data]);
    }
    
}
