<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';

    protected $fillable = [
        'city' ,
        'name' ,
        'iata',
    ];
}
