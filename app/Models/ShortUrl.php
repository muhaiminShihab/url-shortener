<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'main_url',
        'short_url',
        'total_click'
    ];

    // get short url
    public function getShortUrlAttribute($value)
    {
        return URL::to('/') . '/' . $value;
    }
}
