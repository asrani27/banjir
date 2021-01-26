<?php

use App\RT;
use App\RW;
use App\Dapur;
use App\Banjir;
use App\Galery;
use App\Lokasi;
use App\Kecamatan;
use App\Kelurahan;
use Carbon\Carbon;
use App\Infografis;
use App\Pengungsian;
use App\Rekapitulasi;
use Illuminate\Support\Facades\Auth;

function namaKecamatan($param)
{
    $nama = Kecamatan::find($param)->nama;
    return $nama;
}

function namaKelurahan($param)
{
    $nama = Kelurahan::find($param)->nama;
    return $nama;
}

function kecamatan()
{
    return Kecamatan::get();
}

function kelurahan()
{
    if(Auth::user()->hasRole('kecamatan')){
        $data = Kelurahan::where('kecamatan_id', Auth::user()->kecamatan->id)->get();
    }else{
        $data = Kelurahan::get();
    }
    return $data;
}

function lokasi()
{
    if(Auth::user()->hasRole('kecamatan')){
        $kelurahan_id = Kelurahan::where('kecamatan_id', Auth::user()->kecamatan->id)->pluck('id');
        $data = Lokasi::whereIn('kelurahan_id', $kelurahan_id)->get();
    }elseif(Auth::user()->hasRole('kelurahan')){
        $data = Lokasi::where('kelurahan_id', Auth::user()->kelurahan->id)->get();
    }else{
        $data = Lokasi::get();
    }
    return $data;
}

function rt()
{
    return RT::get();
}

function rw()
{
    return RW::get();
}

function countKec($param)
{
    return count(Rekapitulasi::where('kecamatan_id', $param)->get());
}

function rekapitulasi()
{
    $kec = Kecamatan::get();
    $map = $kec->map(function($item){
        $item->terdampak_kk = $item->rekapitulasi->sum('terdampak_kk');
        $item->terdampak_jiwa = $item->rekapitulasi->sum('terdampak_jiwa');
        $item->mengungsi_kk = $item->rekapitulasi->sum('mengungsi_kk');
        $item->mengungsi_jiwa = $item->rekapitulasi->sum('mengungsi_jiwa');
        $item->balita = $item->rekapitulasi->sum('balita');
        $item->lansia = $item->rekapitulasi->sum('lansia');
        $item->ibu = $item->rekapitulasi->sum('ibu');
        return $item;
    });
    return $map;
}

function rekapitulasiluar()
{
    $kec = Kecamatan::get();
    $map = $kec->map(function($item){
        $item->jumlah = $item->rekapitulasiluar->sum('jumlah');
        $item->perempuan = $item->rekapitulasi->sum('perempuan');
        $item->laki = $item->rekapitulasi->sum('laki');
        $item->balita = $item->rekapitulasi->sum('balita');
        $item->lansia = $item->rekapitulasi->sum('lansia');
        return $item;
    });
    return $map;
}

function petaBanjir()
{
    return Banjir::get()->map(function($item){
        $item->nama_kelurahan = $item->kelurahan->nama;
        $item->nama_kecamatan = $item->kelurahan->kecamatan->nama;
        return $item;
    })->toArray();
}

function banjir()
{
    return Banjir::get();
}
function petaDapur()
{
    return Dapur::get()->map(function($item){
        $item->nama_kelurahan = $item->kelurahan->nama;
        $item->nama_kecamatan = $item->kelurahan->kecamatan->nama;
        return $item;
    })->toArray();
}

function dapur()
{
    return Dapur::get();
}

function petaPengungsian()
{
    return Pengungsian::get()->map(function($item){
        $item->nama_kelurahan = $item->kelurahan->nama;
        $item->nama_kecamatan = $item->kelurahan->kecamatan->nama;
        return $item;
    })->toArray();
}

function pengungsian()
{
    return Pengungsian::get();
}

function galery()
{
    return Galery::get();
}

function infografis()
{
    return Infografis::get();
}

function titik()
{
    $data = Kecamatan::get()->map(function($item){
        $item->data_kelurahan = $item->kelurahan->pluck('id')->toArray();
        $item->titik_banjir = count(Banjir::whereIn('kelurahan_id', $item->data_kelurahan)->get());
        $item->titik_posko = count(Pengungsian::whereIn('kelurahan_id', $item->data_kelurahan)->get());
        $item->titik_dapur = count(Dapur::whereIn('kelurahan_id', $item->data_kelurahan)->get());
        return $item;
    });
    return $data;
}