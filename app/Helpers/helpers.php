<?php

use App\RT;
use App\RW;
use App\Kecamatan;
use App\Kelurahan;
use Carbon\Carbon;

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

function rt()
{
    return RT::get();
}

function rw()
{
    return RW::get();
}
