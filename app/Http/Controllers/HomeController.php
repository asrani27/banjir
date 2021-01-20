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

    }
    public function pengungsianAdmin()
    {

    }
    
    public function home()
    {
        return view('admin.home');
    }
}
