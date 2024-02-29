<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'passengers';

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_day',
        'document_number',
    ];
}
