<?php

namespace App\Http\Controllers;

use App\Rekapitulasi;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    
    public function index()
    {
        $data = Rekapitulasi::get();
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
            $attr = $req->all();
            Rekapitulasi::create($attr);
            toastr()->success('Data Berhasil Disimpan');
            return redirect('/admin/rekapitulasi');
        }else{
            toastr()->error('Data Lokasi Dan RT Sudah Ada, Silahkan Perbaharui Yang Ada');
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
    }
}
