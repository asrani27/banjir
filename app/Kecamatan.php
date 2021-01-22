<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
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
