<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // function to sign-in
    public function sign_in(Request $request)
    {
        // check request method
        if ( $request->isMethod( 'post' ) ) {
            # code...
        } else {
            // return to view
            return view('auth.sign-in');
        }
    }

    // function to sign-up
    public function sign_up(Request $request)
    {
        // check request method
        if ( $request->isMethod( 'post' ) ) {
            # code...
        } else {
            // return to view
            return view('auth.sign-up');
        }
    }
}
