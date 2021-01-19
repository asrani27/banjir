<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    protected $table = 'rw';

    protected $guarded = ['id'];

    public $timestamps = false;
}
