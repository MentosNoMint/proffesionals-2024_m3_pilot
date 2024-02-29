<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\model\Booking;
use Illuminate\Support\Facades\Validator;
class BookingController extends Controller
{
    public function Booking(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_day' => 'required|data',
            'document_number' => 'required|numeric|digits:10'
        ]);

        if($validator->fails()){
            response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Validation error',
                    'errors' => [
                        $validator->errors(),
                    ]
                ]
            ]);
        }

        Booking::create($request->all());

        return response()->json()->setStatusCode(204);
    }

}
