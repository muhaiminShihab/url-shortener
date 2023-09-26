<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Alert;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // function to sign-in
    public function sign_in(Request $request)
    {
        // check request method
        if ( $request->isMethod( 'post' ) ) {
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required',
                ]
            );

            $credentials = $request->only('email', 'password');
            if ( Auth::attempt($credentials) ) {
                $request->session()->regenerate();

                // check session
                if ( session()->has('long_url') ) {
                    // redirect to home page
                    return redirect()->route('home_page');
                } else{
                    // redirect to dashboard
                    return redirect()->route('dashboard_page');
                }
            } else {
                Alert::error('Hey !!', 'Something is wrong.');
                return back();
            }
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

    // sign-out
    public function sign_out()
    {
        Auth::logout();
        return redirect()->route('home_page');
    }
}
