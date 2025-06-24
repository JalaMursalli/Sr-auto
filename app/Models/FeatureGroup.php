<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'color',
        'icon'
    ];

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }
}
