<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use App\RekapitulasiLuar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapitulasiLuarController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('kecamatan')){
            $data = RekapitulasiLuar::where('kecamatan_id', Auth::user()->kecamatan->id)->get();
        }
        elseif(Auth::user()->hasRole('kelurahan')){
            $data = RekapitulasiLuar::where('kelurahan_id', Auth::user()->kelurahan->id)->get();
        }else{
            $data = RekapitulasiLuar::get();
            $kel = Kelurahan::get()->map(function($item){
                $item->perempuan    = $item->rekapitulasiluar->sum('perempuan');
                $item->laki  = $item->rekapitulasiluar->sum('laki');
                $item->balita    = $item->rekapitulasiluar->sum('balita');
                $item->lansia  = $item->rekapitulasiluar->sum('lansia');
                $item->jumlah  = $item->rekapitulasiluar->sum('jumlah');
                return $item;
            });
        }
        return view('admin.rekapitulasiluar.index',compact('data','kel'));
    }

    public function add()
    {
        return view('admin.rekapitulasiluar.add');   
    }
    
    public function store(Request $req)
    {
        $kel = Kelurahan::find($req->kelurahan_id);
        $attr = $req->all();
        $attr['kecamatan_id'] = $kel->kecamatan->id;
        $attr['kelurahan_id'] = $kel->id;
        RekapitulasiLuar::create($attr);
        toastr()->success('Data Berhasil Disimpan');
        return redirect('/admin/rekapitulasi_luar');
    }
    public function edit($id)
    {
        $data = RekapitulasiLuar::find($id);
        return view('admin.rekapitulasiluar.edit',compact('data'));   
    }
    public function update(Request $req, $id)
    {
        $kel = Kelurahan::find($req->kelurahan_id);
        $attr = $req->all();
        $attr['kecamatan_id'] = $kel->kecamatan->id;
        $attr['kelurahan_id'] = $kel->id;

        RekapitulasiLuar::find($id)->update($attr);
        
        toastr()->success('Data Berhasil Diupdate');
        return redirect('/admin/rekapitulasi_luar');
    }
    public function delete($id)
    {
        try{
            RekapitulasiLuar::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        }catch(\Exception $e)
        {
            toastr()->error('gagal Di Hapus');
            return back();
        }
    }
}
