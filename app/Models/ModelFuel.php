<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFuel extends Model
{
    use HasFactory;

    protected $fillable = [
        'fuel_id',
        'model_id',
    ];
}
