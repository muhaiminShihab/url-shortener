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
}
