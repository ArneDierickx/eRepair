<?php

namespace App\Http\Controllers;

use App\User;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    public function login()
    {
        $username = request("username");
        $password = request("password");
        $token = auth("api")->attempt(["username" => $username, "password" => $password]);
        if (!$token) {
            return response()->json(["error" => "Unauthorized"], 401);
        }

        return $this->respondWithToken($token);
    }

    private function respondWithToken($token)
    {
        $cookie = cookie("token", $token, auth("api")->factory()->getTTL(), "/", "arnedierickx.be", true, true);
        return response('')->cookie($cookie);
    }

    public function register()
    {
        $user = User::create([
            "username" => request("username"),
            "password" => request("password")
        ]);

        $token = auth("api")->login($user);

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth("api")->logout();
    }
}
