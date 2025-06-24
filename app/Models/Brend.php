<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelModel;

class Brend extends LaravelModel
{
    use HasFactory;
    protected $fillable = [
        'name_az',
        'name_en',
        'name_ru',
        'slug_az',
        'slug_en',
        'slug_ru',
        'image',
        'alt_image_az',
        'alt_image_en',
        'alt_image_ru',
        'image_title_az',
        'image_title_en',
        'image_title_ru',
        'url',
        'phone_number',
        'country_az',
        'country_en',
        'country_ru',
        'vp_url'

    ];
    public function getNameAttribute(){
        return $this->getAttribute('name_'.app()->getLocale());
    }
    public function getCountryAttribute(){
        return $this->getAttribute('country_'.app()->getLocale());
    }
    public function getSlugAttribute(){
        return $this->getAttribute('slug_'.app()->getLocale());
    }
    public function getAltImageAttribute(){
        return $this->getAttribute('alt_image_'.app()->getLocale());
    }
    public function getImageTitleAttribute(){
        return $this->getAttribute('image_title_'.app()->getLocale());
    }
    public function models()
    {
        return $this->hasMany(Model::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function contactUs()
{
    return $this->hasOne(ContactUs::class);
}


    public function socials(){
        return $this->hasMany(BrendSocial::class);
    }

}
