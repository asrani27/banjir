<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dapur extends Model
{
    protected $table = 'dapur';

    protected $guarded = ['id'];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
