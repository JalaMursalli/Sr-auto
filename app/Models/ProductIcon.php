<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIcon extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'icon',
        'value',
        'title_az',
        'title_en',
        'title_ru',
        'product_id'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function product()
    {
         return $this->belongsTo(Product::class);
    }

}
