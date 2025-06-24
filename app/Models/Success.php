<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'description_az',
        'description_en',
        'description_ru',
        'btn_title_az',
        'btn_title_en',
        'btn_title_ru',
        'url',
        'image'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getBtnTitleAttribute(){
        return $this->getAttribute('btn_title_'.app()->getLocale());
    }
    public function getMetaDescriptionAttribute(){
        return $this->getAttribute('meta_description_'.app()->getLocale());
    }
}
