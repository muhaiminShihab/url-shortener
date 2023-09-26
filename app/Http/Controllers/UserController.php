<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Alert;

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
            // data validate
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            // dd($request->all());

            // store data
            User::create(
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password'))
                ]
            );

            // return back
            Alert::success('Hey !!', 'Registration successful.');
            return back();

        } else {
            // return to view
            return view('auth.sign-up');
        }
    }
}
