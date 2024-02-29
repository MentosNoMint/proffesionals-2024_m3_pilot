<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Airport;
use App\Http\Resources\AirportResource;
class AirportController extends Controller
{



    public function searchAirport()
    {
        $query = $_GET['query'] ?? '';

        return response()->json([
            'data' => [
                'items' => AirportResource::collection(Airport::where('name' , 'like' , '%' . $query . '%')-> orWhere('iata' , 'like' , '%' . $query . '%')->orWhere('city' , 'like' , '%' . $query . '%')->get()),
            ],
        ]);
    }
}
