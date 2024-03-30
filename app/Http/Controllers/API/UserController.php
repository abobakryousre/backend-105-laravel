<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if (!$user) return response()->json(["message" => "user not exist"], 400);
        if (!Hash::check($password, $user->password)) return response()->json(["message" => "Password not correct"], 400);
        $token = $user->createToken($user->name . "_token")->plainTextToken;

        $res = [
            "message" => "logged in successfully",
            "_token" => $token,
            "user" => $user
        ];
        return response()->json($res);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $tokens = $user->tokens();
        $tokens->delete();
        return response()->json(["message" => "logged out"]);
    }
}
