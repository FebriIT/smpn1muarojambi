<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $data=Mapel::all();
        return view('mapel.index',compact('data'));
    }
    public function tambah(Request $req)
    {
        $data=new Mapel;
        $data->mapel_nama=$req->mapel_nama;
        $data->save();
        
        return redirect()->back()->with('success', 'Pengumuman Berhasil Dibuat');
    }
    public function edit(Request $request,$id)
    {
        if($request->isMethod('post')){

            $data=$request->all();
            Mapel::where(['mapel_id'=>$id])
            ->update(['mapel_nama'=>$data['mapel_nama']]);
            
    
            return redirect()->back()->with('toast_success','Data Berhasil Diupdate');
        }
    }
    public function hapus($id)
    {
        $data=Mapel::where('mapel_id',$id);
        $data->delete();

        return redirect()->back()->with('toast_success','Data Berhasil Dihapus');
    }
}
