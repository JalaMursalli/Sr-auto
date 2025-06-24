<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_address_az',
        'sale_address_en',
        'sale_address_ru',
        'sale_contact_number1',
        'sale_contact_number2',
        'sale_contact_number3',
        'sale_email',
        'service_address_az',
        'service_address_en',
        'service_address_ru',
        'service_contact_number1',
        'service_contact_number2',
        'service_contact_number3',
        'service_email',
        'waze_url',
         'brend_id'
    ];
     public function getSaleAddressAttribute(){
        return $this->getAttribute('sale_address_'.app()->getLocale());
    }
     public function getServiceAddressAttribute(){
        return $this->getAttribute('service_address_'.app()->getLocale());
    }
    public function brend()
{
    return $this->belongsTo(Brend::class);
}

}
