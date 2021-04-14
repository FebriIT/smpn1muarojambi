<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use Yajra\DataTables\DataTables;


class PengumumanController extends Controller
{

    // function admin
    public function index(Request $request)
    {
       
        $data=Pengumuman::orderBy('created_at', 'DESC')->get();
        return view('pengumuman.index',['data'=>$data]);
    }

    public function tambah(Request $request)
    {
        $validate=$this->validate($request,[
            'judul_pengumuman'=>'required',
            'deskripsi_pengumuman'=>'required',
            
        ]);
        $data=new Pengumuman;
        $data->pengumuman_judul=$request->judul_pengumuman;
        $data->pengumuman_deskripsi=$request->deskripsi_pengumuman;
        $data->pengumuman_author=auth()->user()->name;
        $data->save();

        
        return redirect()->back()->with('success', 'Pengumuman Berhasil Dibuat');
    }

    public function hapus($id)
    {
        
        $data=Pengumuman::where('pengumuman_id',$id);
        $data->delete();

        return redirect()->back()->with('toast_success','Data Berhasil Dihapus');
    }

    public function edit(Request $request,$id)
    { 
        if($request->isMethod('post')){

            $data=$request->all();
            Pengumuman::where(['pengumuman_id'=>$id])
            ->update(['pengumuman_judul'=>$data['pengumuman_judul'],
            'pengumuman_deskripsi'=>$data['pengumuman_deskripsi']]);
            
    
            return redirect()->back()->with('toast_success','Data Berhasil Diupdate');
        }
    }





    // function public

    public function halamandepan()
    {
        $data=Pengumuman::orderBy('created_at','desc')->paginate(10);
        return view('pengumuman.halamandepan',['data'=>$data]);
    }
}
