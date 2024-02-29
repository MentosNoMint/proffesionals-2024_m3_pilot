<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class token extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'api_token',
        'first_name',
        'last_name',
        'phone',
        'document_number',
    ];
}
