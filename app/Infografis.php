<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{
    
    protected $table = 'infografis';

    public $timestamps = false;

    protected $guarded = ['id'];
}
