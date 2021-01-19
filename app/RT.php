<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = 'rt';

    protected $guarded = ['id'];

    public $timestamps = false;
}
