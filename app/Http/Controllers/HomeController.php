<?php

namespace App\Http\Controllers;

use App\Dapur;
use App\Banjir;
use App\DataJson;
use App\Kecamatan;
use App\Pengungsian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $json = DataJson::orderBy('tanggal','ASC')->get();
        $data['tanggal'] = $json->pluck('tanggal');
        $data['banjir'] = $json->map(function($item){
            return count(json_decode($item->json_banjir));
        });
        $data['dapur'] = $json->map(function($item){
            return count(json_decode($item->json_dapur));
        });
        $data['pengungsian'] = $json->map(function($item){
            return count(json_decode($item->json_pengungsian));
        });
        $data['pengungsi'] = $json->map(function($item){
            return count(json_decode($item->json_rekap));
        });
        $data['pengungsiluar'] = $json->map(function($item){
            return count(json_decode($item->json_rekapluar));
        });
        //dd($data);
        return view('index',compact('data'));
    }

    public function vtronbanjir()
    {
        return view('vtron_posisibanjir');
    }
    public function vtronrekap()
    {
        return view('vtron_rekap');
    }
    public function vtronrekapluar()
    {
        return view('vtron_rekapluar');
    }
    

    public function dapurUmum()
    {
        $json = DataJson::orderBy('tanggal','ASC')->get();
        $data['tanggal'] = $json->pluck('tanggal');
        $data['banjir'] = $json->map(function($item){
            return count(json_decode($item->json_banjir));
        });
        $data['dapur'] = $json->map(function($item){
            return count(json_decode($item->json_dapur));
        });
        $data['pengungsian'] = $json->map(function($item){
            return count(json_decode($item->json_pengungsian));
        });
        $data['pengungsi'] = $json->map(function($item){
            return count(json_decode($item->json_rekap));
        });
        $data['pengungsiluar'] = $json->map(function($item){
            return count(json_decode($item->json_rekapluar));
        });
        return view('dapur',compact('data'));
    }

    public function pengungsian()
    {
        $json = DataJson::orderBy('tanggal','ASC')->get();
        $data['tanggal'] = $json->pluck('tanggal');
        $data['banjir'] = $json->map(function($item){
            return count(json_decode($item->json_banjir));
        });
        $data['dapur'] = $json->map(function($item){
            return count(json_decode($item->json_dapur));
        });
        $data['pengungsian'] = $json->map(function($item){
            return count(json_decode($item->json_pengungsian));
        });
        $data['pengungsi'] = $json->map(function($item){
            return count(json_decode($item->json_rekap));
        });
        $data['pengungsiluar'] = $json->map(function($item){
            return count(json_decode($item->json_rekapluar));
        });
        return view('pengungsian',compact('data'));
    }

    public function dapurAdmin()
    {
        return view('admin.dapur');
    }
    public function pengungsianAdmin()
    {
        return view('admin.pengungsian');

    }
    
    public function home()
    {
        return view('admin.home');
    }
}
