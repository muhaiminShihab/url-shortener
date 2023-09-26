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

        // destroy session
        session()->forget('long_url');

        // redirect to dashboard
        Alert::success('Hey !!', 'URL generated successfully.');
        return redirect()->route('dashboard_page');
    }

    // destroy url
    public function destroy($id)
    {
        $url = ShortUrl::findOrFail($id);
        $url->delete();

        // return back
        Alert::success('Hey !!', 'URL removed successfully.');
        return back();
    }

    // access url
    public function access($key)
    {
        $url = ShortUrl::where('short_url', $key)->first();
        if ( !is_null($url) ) {
            // update url
            $url->update(
                [
                    'total_click' => $url->total_click + 1
                ]
            );

            return redirect($url->main_url);
        } else {
            return redirect()->route('home_page');
        }
    }
}
