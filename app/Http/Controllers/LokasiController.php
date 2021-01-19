<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $data = Lokasi::get();
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
    public function edit()
    {
        
    }
    public function update()
    {
        
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
