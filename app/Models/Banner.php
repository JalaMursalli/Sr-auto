<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'image'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }

}
