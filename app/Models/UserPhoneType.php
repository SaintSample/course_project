<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoneType extends Model
{
    use HasFactory;

    protected $table = 'user_phone_types';

    public $timestamps = false;
}
