<?php

use App\RT;
use App\RW;
use App\Lokasi;
use App\Kecamatan;
use App\Kelurahan;
use Carbon\Carbon;
use App\Rekapitulasi;

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
    return Kelurahan::get();
}

function lokasi()
{
    return Lokasi::get();
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
        return $item;
    });
    return $map;
}
