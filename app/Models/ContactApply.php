<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactApply extends Model
{
    use HasFactory;
      protected $fillable = [
      'name',
      'surname',
      'email',
      'application_type',
      'text'
    ];
}
