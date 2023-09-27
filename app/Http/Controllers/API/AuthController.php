<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{
    // function to sign-in
    public function sign_in(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        $user = User::where('email', $request->input('email'))->first();

        if ( !$user || !Hash::check($request->input('password'), $user->password) ) {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }

        // create token
        $token = $user->createToken('authToken')->plainTextToken;

        // return response
        return response()->json([
            'message' => 'Sign-in successful.',
            'token' => $token,
        ]);
    }

    // function to sign-out
    public function sign_out(Request $request)
    {
        if ( !is_null($request->bearerToken()) ) {
            $token = $request->bearerToken();
            $model = Sanctum::$personalAccessTokenModel;
            $accessToken = $model::findToken($token);
            $accessToken->delete();

            // return response
            return response()->json([
                'message' => 'Sign-out successful.'
            ]);
        }

        // return response
        return response()->json([
            'message' => 'Invalid token.'
        ]);

    }

    // function to get user details
    public function user()
    {
        // return response
        return response()->json([
            'data' => Auth::user()
        ]);
    }
}
