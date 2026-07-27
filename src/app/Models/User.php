<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'birthday',
        'gender',
        'memo',
        'allergy',
        'history',
        'visit_count',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

