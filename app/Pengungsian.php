<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengungsian extends Model
{
    protected $table = 'pengungsian';

    protected $guarded = ['id'];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
