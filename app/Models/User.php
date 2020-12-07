<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function passports(): HasMany
    {
        return $this->hasMany(Passport::class, 'user_id');
    }

    public function phones(): HasMany
    {
        return $this->hasMany(UserPhone::class, 'user_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    public function work_conditions(): HasMany
    {
        return $this->hasMany(WorkCondition::class, 'user_id');
    }

    public function vacations(): HasMany
    {
        return $this->hasMany(Vacation::class, 'user_id');
    }
}
