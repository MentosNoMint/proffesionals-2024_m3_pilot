<?php

namespace App\Http\Controllers;

use App\Http\Resources\AirportResource;
use App\model\token;
use Illuminate\Http\Request;

class User extends Controller
{
    public function searchUser()
    {
        $token = $_GET['token'] ?? '';

        return response()->json([
            'data' => [
                'items' => AirportResource::collection(token::where('api_token' , $token )->get()),
            ],
        ]);
    }
}


