<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
    ];
    public function getNameAttribute(){
        return $this->getAttribute('name_'.app()->getLocale());
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
