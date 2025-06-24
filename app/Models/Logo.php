<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'image',
        'phone_title',
        'image_light',
        'fav_icon'

    ];
}
