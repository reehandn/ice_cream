<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
        use HasFactory, Notifiable;

    protected $table = 'users'; // Nama tabel jika berbeda dengan konvensi

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'is_admin'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean'
    ];


    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    
}
