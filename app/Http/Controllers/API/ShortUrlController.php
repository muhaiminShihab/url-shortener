<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    // function to create short url
    public function store(Request $request)
    {
        // data validate
        $request->validate(
            [
                'long_url' => 'required'
            ]
        );

        // store data
        $url = ShortUrl::create(
            [
                'user_id' => Auth::id(),
                'main_url' => $request->input('long_url'),
                'short_url' => Str::random(5)
            ]
        );

        // return response
        return response()->json([
            'message' => 'URL generated successfully.',
            'data' => $url
        ]);
    }

    // function to destroy short url
    public function destroy(Request $request)
    {
        // data validate
        $request->validate(
            [
                'id' => 'required|integer|exists:short_urls,id'
            ]
        );

        $url = ShortUrl::find($request->id);

        if ( is_null($url) || $url->user_id != Auth::id() ) {
            // return response
            return response()->json([
                'message' => 'URL not found or Invalid access.',
            ]);
        }

        // destroy
        $url->delete();

        // return response
        return response()->json([
            'message' => 'URL removed successfully.',
        ]);
    }

    // function to get short urls
    public function index()
    {
        $urls = ShortUrl::where('user_id', Auth::id())->get();

        // return response
        return response()->json([
            'data' => $urls,
        ]);
    }
}
