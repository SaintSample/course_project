<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

    public function type(): BelongsTo
    {
        return $this->belongsTo(UserAddressType::class, 'type');
    }
}
