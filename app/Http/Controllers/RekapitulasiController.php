<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Rekapitulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapitulasiController extends Controller
{
    
    public function index()
    {
        if(Auth::user()->hasRole('kecamatan')){
            $data = Rekapitulasi::where('kecamatan_id', Auth::user()->kecamatan->id)->get();
        }else{
            $data = Rekapitulasi::get();
        }
        return view('admin.rekapitulasi.index',compact('data'));
    }
    public function add()
    {
        return view('admin.rekapitulasi.add');   
    }
    public function store(Request $req)
    {
        if(Rekapitulasi::where('lokasi_id', $req->lokasi_id)->where('rt', $req->rt)->first() == null)
        {
            $lok = Lokasi::find($req->lokasi_id);
            $attr = $req->all();
            $attr['kecamatan_id'] = $lok->kelurahan->kecamatan->id;
            $attr['kelurahan_id'] = $lok->kelurahan->id;
            Rekapitulasi::create($attr);
            toastr()->success('Data Berhasil Disimpan');
            return redirect('/admin/rekapitulasi');
        }else{
            toastr()->error('Data Lokasi Dan RT Sudah Ada, Silahkan Perbaharui Yang Ada');
            return back();
        }
    }
    public function edit($id)
    {
        $data = Rekapitulasi::find($id);
        return view('admin.rekapitulasi.edit',compact('data'));   
    }
    public function update(Request $req, $id)
    {
        $lok = Lokasi::find($req->lokasi_id);
        $attr = $req->all();
        $attr['kecamatan_id'] = $lok->kelurahan->kecamatan->id;
        $attr['kelurahan_id'] = $lok->kelurahan->id;

        Rekapitulasi::find($id)->update($attr);
        
        toastr()->success('Data Berhasil Diupdate');
        return redirect('/admin/rekapitulasi');
    }
    public function delete($id)
    {
        try{
            Rekapitulasi::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        }catch(\Exception $e)
        {
            toastr()->error('gagal Di Hapus');
            return back();
        }
    }
}
