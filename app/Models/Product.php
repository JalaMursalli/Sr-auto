<?php

namespace App\Models;

use App\Http\Controllers\Backend\ProductIconController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model as CarModel;

class Product extends Model
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
        'meta_title_az',
        'meta_title_en',
        'meta_title_ru',
        'meta_description_az',
        'meta_description_en',
        'meta_description_ru',
        'alt_image_az',
        'alt_image_en',
        'alt_image_ru',
        'image_title_az',
        'image_title_en',
        'image_title_ru',
        'power_and_speed_az',
        'power_and_speed_en',
        'power_and_speed_ru',
        'battery_and_charge_az',
        'battery_and_charge_en',
        'battery_and_charge_ru',
        'size_az',
        'size_en',
        'size_ru',
        'features_az',
        'features_en',
        'features_ru',
        'sale_status',
        'price',
        'year',
        'engine_volume',
        'expence',
        'horse_power',
        'acceleration',
        'battery',
        'charge',
        'max_distance',
        'brend_id',
        'model_id',
        'fuel_id',
        'status_id',
        'guarantee_az',
        'guarantee_en',
        'guarantee_ru',
    ];
    public function getNameAttribute(){
        return $this->getAttribute('name_'.app()->getLocale());
    }
    public function getSlugAttribute(){
        return $this->getAttribute('slug_'.app()->getLocale());
    }
    public function getMetaTitleAttribute(){
        return $this->getAttribute('meta_title_'.app()->getLocale());
    }
    public function getMetaDescriptionAttribute(){
        return $this->getAttribute('meta_description_'.app()->getLocale());
    }
     public function getGuaranteeAttribute(){
        return $this->getAttribute('guarantee_'.app()->getLocale());
    }
    public function brend()
    {
         return $this->belongsTo(Brend::class);
    }
    public function model()
    {
         return $this->belongsTo(CarModel::class);
    }
    public function fuel()
    {
         return $this->belongsTo(Fuel::class);
    }
    public function productIcons()
    {
        return $this->hasMany(ProductIcon::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function offer()
    {
        return $this->hasOne(Offer::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_feature')
                    ->withTimestamps();
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

}

