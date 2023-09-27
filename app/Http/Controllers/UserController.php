<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Alert;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // function to show dashboard
    public function dashboard()
    {
        $urls = ShortUrl::where('user_id', Auth::id())->get();
        return view('app.dashboard', compact('urls'));
    }
}
