<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('kecamatan')){
            $kelurahan_id = Kelurahan::where('kecamatan_id', Auth::user()->kecamatan->id)->pluck('id');
            $data = Lokasi::whereIn('kelurahan_id', $kelurahan_id)->get();
        }
        elseif(Auth::user()->hasRole('kelurahan')){
            $data = Lokasi::where('kelurahan_id', Auth::user()->kelurahan->id)->get();
        }
        else{
            $data = Lokasi::get();
        }
        return view('admin.lokasi.index',compact('data'));
    }
    public function add()
    {
        return view('admin.lokasi.add');   
    }
    public function store(Request $req)
    {
        if(Lokasi::where('nama', $req->nama)->where('kelurahan_id', $req->kelurahan_id)->first() == null)
        {
            $attr = $req->all();
            $attr['nama'] = strtoupper($req->nama);
            Lokasi::create($attr);
            toastr()->success('Data Lokasi Berhasil Disimpan');
            return redirect('/admin/lokasi');
        }else{
            toastr()->error('Data Lokasi Sudah Ada');
            return back();
        }
    }
    public function edit($id)
    {
        $data = Lokasi::find($id);
        return view('admin.lokasi.edit',compact('data'));
    }
    public function update(Request $req, $id)
    {
        $attr = $req->all();
        $attr['nama'] = strtoupper($req->nama);
        Lokasi::find($id)->update($attr);
        toastr()->success('Data Lokasi Berhasil DiUpdate');
        return redirect('/admin/lokasi');
    }
    public function delete($id)
    {
        try{
            Lokasi::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        }catch(\Exception $e)
        {
            toastr()->error('gagal Di Hapus');
            return back();
        }
    }
}
