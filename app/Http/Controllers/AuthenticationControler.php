<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationControler extends Controller
{
    public function login(Request $request){
        $valid = request()->validate([
            'email' => "required|email",
            "password" => "required"
        ]);
        
        if(! Auth::attempt($valid)){
            return response()->json(["message" => "invalid credentials"], 401);
        }
        $user = User::where("email", $valid["email"])->first();
        return response()->json([
            "access_token" => $user->createToken("api_token")->plainTextToken, 
            "token_type" => "Bearer "
        ]);
    }
}
