<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as laravel;


class Model extends laravel
{
    use HasFactory;
    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'brend_id'
    ];
    public function brend()
    {
        return $this->belongsTo(Brend::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function fuels()
    {
        return $this->belongsToMany(Fuel::class, 'model_fuels');
    }

    public function getNameAttribute()
    {
        return $this->getAttribute('name_' . app()->getLocale());
    }

}
