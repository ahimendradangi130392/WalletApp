<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
       
        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('login_token')->accessToken;
            return response()->json(['status'=>true,'access_token' => $token]);
        } else {
            Log::error('Invalid credentials');
            return response()->json(['status'=>false,'message' => 'Invalid credentials'], 401);
        }
    }
}
