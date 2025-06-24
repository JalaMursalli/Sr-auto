<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use App\Models\Model;

class Price extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'min_price',
        'max_price',
        'brend_id',
    ];

    protected $casts = [
        'min_price' => 'float',
        'max_price' => 'float',
    ];

    public function brend()
    {
        return $this->belongsTo(Brend::class, 'brend_id');
    }
}
