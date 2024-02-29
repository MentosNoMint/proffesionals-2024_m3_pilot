<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
      'first_name',
        'last_name',
        'phone',
        'password',
        'document_number',
    ];

public function generateToken()
{
    $this->api_token = Str::random();
    $this->save();
    return  $this->api_token;
}


}
