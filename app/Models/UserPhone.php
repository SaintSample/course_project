<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPhone extends Model
{
    use HasFactory;

    protected $table = 'user_phones';

    public function type(): BelongsTo
    {
        return $this->belongsTo(UserPhoneType::class, 'type');
    }
}
