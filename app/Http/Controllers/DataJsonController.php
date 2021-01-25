<?php

namespace App\Http\Controllers;

use PDF;
use App\DataJson;
use App\Kecamatan;
use App\Kelurahan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataJsonController extends Controller
{
    public function index()
    {
        $data = DataJson::get();
        return view('admin.datajson.index',compact('data'));
    }

    public function store()
    {
        $today = Carbon::today();
        $rekap = json_encode(Rekapitulasi()->toArray());
        $rekapluar = json_encode(RekapitulasiLuar()->toArray());
        $pengungsian = json_encode(pengungsian()->toArray());
        $dapur = json_encode(dapur()->toArray());
        
        $attr['tanggal'] = $today;
        $attr['json_rekap'] = $rekap;
        $attr['json_rekapluar'] = $rekapluar;
        $attr['json_pengungsian'] = $pengungsian;
        $attr['json_dapur'] = $dapur;

        $check = DataJson::where('tanggal', $today)->first();
        if($check == null){
            DataJson::create($attr);
            toastr()->success('Data Berhasil Disimpan');
        }else{
            toastr()->success('Data Berhasil DiUpdate');
            DataJson::find($check->id)->update($attr);
        }
        return back();
    }

    public function json_rekap($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_rekap));
    }
    
    public function json_rekapluar($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_rekapluar));
    }
    

    public function json_rekap_print($id)
    {
        $now = Carbon::now()->format('dmYHi');
        $data = collect(json_decode(DataJson::find($id)->json_rekap));
        $tanggal = DataJson::find($id)->tanggal;
        dd($tanggal);
        $pdf = PDF::loadView('admin.pdf.rekap', compact('data','tanggal'));
        return $pdf->download('rekapitulasi'.$now.'.pdf');
    }
    
    public function json_rekapluar_print($id)
    {
        $now = Carbon::now()->format('dmYHi');
        $data = collect(json_decode(DataJson::find($id)->json_rekapluar))->map(function($item){
            return $item->rekapitulasiluar;
        })->collapse()->map(function($item){
            $item->kecamatan = Kecamatan::find($item->kecamatan_id)->nama;
            $item->kelurahan = Kelurahan::find($item->kelurahan_id)->nama;
            return $item;
        });
        $tanggal = DataJson::find($id)->tanggal;
        $pdf = PDF::loadView('admin.pdf.rekapluar', compact('data','tanggal'));
        return $pdf->download('rekapitulasiluar'.$now.'.pdf');
    }

    public function json_dapur($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_dapur));
    }
    
    public function json_pengungsian($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_pengungsian));
    }
}
