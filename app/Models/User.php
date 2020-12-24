<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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

    protected $fillable = [
        'last_name',
        'name',
        'second_name',
        'maiden_name',
        'birthday_at',
        'room',
        'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //======Relations======

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

    public function manager(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'users_managers',
            'id',
            'user_id',
        );
    }


    public function subordinate(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'users_managers',
            'manager_id',
            'user_id',
            'id'
        );
    }

    //======Auth=====

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    //======Methods======

    /**
     * Get the full name of user
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name . ' ' . $this->name . ' ' . $this->second_name;
    }
}
