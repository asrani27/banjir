<?php

namespace App\Http\Controllers;

use App\DataJson;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    
    public function json_dapur($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_dapur));
    }
    
    public function json_pengungsian($id)
    {
        return response()->json(json_decode(DataJson::find($id)->json_pengungsian));
    }
}
