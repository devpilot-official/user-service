<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    //
    protected function userAuthToken($email, $token){
        return response()->json([
            'data' => ['email' => $email],
            'message' => 'authentication and authorization was successful.',
            'token' => $token,
        ], 200);
    }
}
