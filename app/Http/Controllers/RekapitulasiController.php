<?php

namespace App\Http\Controllers;

use App\Dapur;
use App\Banjir;
use App\Lokasi;
use App\Kecamatan;
use App\Kelurahan;
use App\Pengungsian;
use App\Rekapitulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapitulasiController extends Controller 
{    
    public function index()
    {
        if(Auth::user()->hasRole('kecamatan')){
            $data = Rekapitulasi::where('kecamatan_id', Auth::user()->kecamatan->id)->get();
        }
        elseif(Auth::user()->hasRole('kelurahan')){
            $data = Rekapitulasi::where('kelurahan_id', Auth::user()->kelurahan->id)->get();
        }else{
            $data = Rekapitulasi::get();
            $kel = Kelurahan::get()->map(function($item){
                $item->terdampak_kk    = $item->rekapitulasi->sum('terdampak_kk');
                $item->terdampak_jiwa  = $item->rekapitulasi->sum('terdampak_jiwa');
                $item->mengungsi_kk    = $item->rekapitulasi->sum('mengungsi_kk');
                $item->mengungsi_jiwa  = $item->rekapitulasi->sum('mengungsi_jiwa');
                $item->balita  = $item->rekapitulasi->sum('balita');
                $item->lansia  = $item->rekapitulasi->sum('lansia');
                $item->ibu  = $item->rekapitulasi->sum('ibu');
                return $item;
            });
        }
        return view('admin.rekapitulasi.index',compact('data','kel'));
    }

    public function json()
    {
        return response()->json(Rekapitulasi());
    }
    public function add()
    {
        return view('admin.rekapitulasi.add');   
    }
    
    public function detail($id)
    {
        $data = Kelurahan::where('kecamatan_id', $id)->get()->map(function($item){
            $item->kecamatan = $item->kecamatan->nama;
            $item->terdampak_kk = $item->rekapitulasi->sum('terdampak_kk');
            $item->terdampak_jiwa = $item->rekapitulasi->sum('terdampak_jiwa');
            $item->mengungsi_kk = $item->rekapitulasi->sum('mengungsi_kk');
            $item->mengungsi_jiwa = $item->rekapitulasi->sum('mengungsi_jiwa');
            $item->balita = $item->rekapitulasi->sum('balita');
            $item->lansia = $item->rekapitulasi->sum('lansia');
            $item->ibu = $item->rekapitulasi->sum('ibu');
            return $item;
        });
        // dd($kel);
        // $data = Rekapitulasi::where('kecamatan_id', $id)->get();
        return view('admin.rekapitulasi.detail',compact('data'));   
    }

    public function titikDetail($id)
    {
        $data = Kecamatan::find($id)->kelurahan->pluck('id')->toArray();
        $banjir = Banjir::whereIn('kelurahan_id', $data)->get();
        $posko = Pengungsian::whereIn('kelurahan_id', $data)->get();
        $dapur = Dapur::whereIn('kelurahan_id', $data)->get();
        
        return view('detailtitik',compact('banjir','posko','dapur'));   
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
