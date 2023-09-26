<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    // show home page
    public function index()
    {
        // return to view
        return view('home');
    }

    // create short url
    public function store(Request $request)
    {
        // data validate
        $request->validate(
            [
                'long_url' => 'required'
            ]
        );

        // check auth
        if ( !Auth::check() ) {
            session()->put('long_url', $request->input('long_url'));

            // redirect to sign-in
            Alert::info('Hey !!', 'Sign-in to short your URL.');
            return redirect()->route('sign_in_page');
        }

        // store data
        ShortUrl::create(
            [
                'user_id' => Auth::id(),
                'main_url' => $request->input('long_url'),
                'short_url' => Str::random(5)
            ]
        );

        // redirect to dashboard
        return redirect()->route('dashboard_page');
    }
}
