<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function lokasi()
    {
        return $this->hasMany(Lokasi::class);
    }
    
    public function rekapitulasi()
    {
        return $this->hasMany(Rekapitulasi::class);
    }
    
    public function rekapitulasiluar()
    {
        return $this->hasMany(RekapitulasiLuar::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
