<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSeo extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'meta_title_az',
            'meta_title_en',
            'meta_title_ru',
            'meta_description_az',
            'meta_description_en',
            'meta_description_ru',
            'image'
        ];
        public function getMetaTitleAttribute(){
            return $this->getAttribute('meta_title_'.app()->getLocale());
        }
        public function getMetaDescriptionAttribute(){
            return $this->getAttribute('meta_description_'.app()->getLocale());
        }
}
