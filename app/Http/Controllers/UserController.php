<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{    
    /**
    * Instantiate a new UserController instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Creates a new user.
     *
     * @param  Request  $request
     * @return Response response
    */
    public function getUser($id){
        if (Auth::user()->id != $id) {
            return response()->json(['data' => null, 'message' => 'you are not authorized.'], 401);
        }
        
        try {
            $user = User::findOrFail($id);

            return response()->json(['data' => $user, 'message' => 'user details found.'], 200);

        } catch (\Exception $e) {

            return response()->json(['data' => null, 'message' => 'user details not found.'], 404);
        }

    }

}