<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'price',
        'images',
        'model_year',
        'max_speed',
        'torque',
        'no_of_horses'
    ];
}
