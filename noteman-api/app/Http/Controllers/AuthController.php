<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AuthController extends Controller
{
    public function store(Request $request) 
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $user = User::whereEmail($request->email)->first();
        
        if ($user && $user->checkPassword($request->password)) {
            return response()->json([
                'status'    => 'success',
                'data'      => [
                    'apiKey'    => $user->api_key,
                    'userName'  => $user->name
                ]
            ]);
        }
     
        return response()->json([
            'error' => 'unauthorized',
            'data' => [
                'message' => "your credentials were not valid, please try again"
            ]
            ], 401);
    }
}
