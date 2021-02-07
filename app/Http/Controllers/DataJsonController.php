<?php

namespace App\Http\Controllers;

use PDF;
use App\Dapur;
use App\Banjir;
use App\DataJson;
use App\Kecamatan;
use App\Kelurahan;
use Carbon\Carbon;
use App\Pengungsian;
use App\Rekapitulasi;
use App\RekapitulasiLuar;
use Illuminate\Http\Request;

class DataJsonController extends Controller
{
    public function index()
    {
        $data = DataJson::orderBy('tanggal','ASC')->get();
        return view('admin.datajson.index',compact('data'));
    }

    public function useData($id)
    {
        $data = DataJson::find($id);
        
        //Rekapitulasi
        $rekap = collect(json_decode($data->json_rekap))->map(function($item){
            return $item->rekapitulasi;
        })->collapse();
        Rekapitulasi::truncate();
        foreach($rekap as $r)
        {
            Rekapitulasi::create((array)$r);
        }

        //Rekapitulasi Luar
        $rekap_luar = collect(json_decode($data->json_rekapluar))->map(function($item){
            return $item->rekapitulasiluar;
        })->collapse();
        
        RekapitulasiLuar::truncate();
        foreach($rekap_luar as $r)
        {
            RekapitulasiLuar::create((array)$r);
        }

        //Banjir
        $banjir = collect(json_decode($data->json_banjir))->map(function($item){
            return $item;
        });
        
        Banjir::truncate();
        foreach($banjir as $r)
        {
            Banjir::create((array)$r);
        }
        //Dapur
        $dapur = collect(json_decode($data->json_dapur))->map(function($item){
            return $item;
        });
        
        Dapur::truncate();
        foreach($dapur as $r)
        {
            Dapur::create((array)$r);
        }
         //Pengungsian
         $pengungsian = collect(json_decode($data->json_pengungsian))->map(function($item){
            return $item;
        });
        
        Pengungsian::truncate();
        foreach($pengungsian as $r)
        {
            Pengungsian::create((array)$r);
        }
        
        toastr()->success('Data Berhasil Di Setting Ke Tanggal '. Carbon::parse($data->tanggal)->format('d M Y'));
        return back();
    }

    public function store()
    {
        $today = Carbon::today();
        $rekap = json_encode(Rekapitulasi()->toArray());
        $banjir = json_encode(banjir()->toArray());
        $rekapluar = json_encode(RekapitulasiLuar()->toArray());
        $pengungsian = json_encode(pengungsian()->toArray());
        $dapur = json_encode(dapur()->toArray());
        
        $attr['tanggal'] = $today;
        $attr['json_banjir'] = $banjir;
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
    
    public function json_dapur_print($id)
    {
        $now = Carbon::now()->format('dmYHi');
        $data = collect(json_decode(DataJson::find($id)->json_dapur));
        $tanggal = DataJson::find($id)->tanggal;
        $pdf = PDF::loadView('admin.pdf.dapur', compact('data','tanggal'));
        return $pdf->download('dapur'.$now.'.pdf');
    }

    

    public function json_banjir($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_banjir));
    }
    
    public function json_banjir_print($id)
    {
        $now = Carbon::now()->format('dmYHi');
        $data = collect(json_decode(DataJson::find($id)->json_banjir));
        $tanggal = DataJson::find($id)->tanggal;
        $pdf = PDF::loadView('admin.pdf.banjir', compact('data','tanggal'));
        return $pdf->download('banjir'.$now.'.pdf');
    }

    public function json_pengungsian_print($id)
    {
        $now = Carbon::now()->format('dmYHi');
        $data = collect(json_decode(DataJson::find($id)->json_pengungsian));
        $tanggal = DataJson::find($id)->tanggal;
        $pdf = PDF::loadView('admin.pdf.pengungsian', compact('data','tanggal'));
        return $pdf->download('pengungsian'.$now.'.pdf');
    }

    public function json_pengungsian($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_pengungsian));
    }
}
