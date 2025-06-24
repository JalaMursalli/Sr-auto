<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrendSocial extends Model
{
    use HasFactory;
     protected $fillable =
    [
        'icon',
        'url',
        'brend_id'
    ];
}
