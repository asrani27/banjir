<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banjir extends Model
{
    protected $table = 'banjir';

    protected $guarded = ['id'];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
