<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // show dashboard
    public function dashboard()
    {
        return view('app.dashboard');
    }
}
