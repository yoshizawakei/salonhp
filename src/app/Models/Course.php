<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'category',
        'duration',
        'price',
        'is_option',
        'is_active',
        'description',
        'sort_order',
    ];
}
