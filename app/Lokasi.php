<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
