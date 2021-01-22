<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiLuar extends Model
{
    protected $table = 'rekapitulasi_luar';

    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
