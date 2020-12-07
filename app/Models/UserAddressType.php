<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddressType extends Model
{
    use HasFactory;

    protected $table = 'user_addresses_types';

    public $timestamps = false;
}
