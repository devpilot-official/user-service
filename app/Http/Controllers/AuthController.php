<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Returns an authentication token using user's credentials.
     *
     * @param  Request  $request [email, password]
     * @return Response response [JWT]
     */
    public function login(Request $request){

        // Validating incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json([
                'data' => $credentials['email'], 
                'message' => 'incorrect login details.', 
                'token' => null
            ], 404);
        }

        return $this->userAuthToken($credentials['email'], $token);
    }

    /**
     * Creates a new user.
     *
     * @param  Request  $request [firstname, lastname, email, password]
     * @return Response response [User created data]
     */
    public function register(Request $request){
        // Validating incoming request 
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {
            $user = new User;
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            return response()->json(['data' => $user, 'message' => 'user creation was successful!'], 201); //success

        } catch (\Exception $e) {
            return response()->json(['data' => $e, 'message' => 'user creation failed!'], 409); //error
        }

    }


}