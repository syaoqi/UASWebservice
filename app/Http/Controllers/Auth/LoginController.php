<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if(!$token = auth()->attempt($request->only("email", "password"))){
            return response(null, 401);
        }

        return response()->json([
            "message" => "Login Berhasil",
            "user" => $request->user()->name,
            "token" => $token
        ]);

    }
}
