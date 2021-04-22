<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $loginData = $request->validate([
          'email' => 'email|required',
          'password' => 'required'
        ]);
        
        if (!auth()->attempt($loginData)) {
          return response(['message' => 'Invalid Credentials']);
        }
       
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
      }
      
      public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
          'message' => 'Successfully logged out'
        ]);
      }
      
      public function user(Request $request) {
        return response()->json($request->user());
      }

      public function all_user() {
        $users = User::get();
        return response()->json($users);
      }
}
