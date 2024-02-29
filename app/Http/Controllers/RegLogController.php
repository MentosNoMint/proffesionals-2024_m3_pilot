<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Users;
use Illuminate\Support\Facades\Validator;
class RegLogController extends Controller
{
    public function reg(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'document_number' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Validation error',
                    'errors' => [
                        $validator->errors(),
                    ]
                ]
            ]);
        }

        Users::create($request->all());

        return response()->json()->setStatusCode(204);

    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone' => 'required',
            'password' => 'required',
        ]);




        if($validator->fails()){
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Validation error',
                    'errors' => [
                        $validator->errors(),
                    ]
                ]
                ]);
        }


        if($user = Users::where('phone' , $request->phone)->first()){
            if($request->password == $user->password) {
                return response()->json([
                   'data' => [
                       'token' => $user->generateToken(),
                   ]
                ]);
            }
        }

        return response()->json([
            'error' => [
                'code' => 401,
                'message' => 'Unauthorized',
                'errors' => [
                    'phone' => 'phone or password incorrect'
                ]
            ]
            ]);

    }
}


