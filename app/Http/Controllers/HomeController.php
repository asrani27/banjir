<?php

namespace App\Http\Controllers;

use App\Dapur;
use App\Banjir;
use App\Kecamatan;
use App\Pengungsian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
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
        return view('dapur');
    }

    public function pengungsian()
    {
        return view('pengungsian');
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
