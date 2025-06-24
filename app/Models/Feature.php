<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    public $guarded = [];

    public function getKeyAttribute()
    {
        return $this->{'key_'.app()->getLocale()};
    }

    public function getValueAttribute()
    {
        return $this->{'value_'.app()->getLocale()};
    }

    public function featureGroup()
    {
        return $this->hasMany(FeatureGroup::class);
    }
}
