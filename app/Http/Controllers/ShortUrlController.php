<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        dd($request->all());
    }
}
