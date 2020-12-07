<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function work_conditions(): HasMany
    {
        return $this->hasMany(WorkCondition::class, 'department_id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager');
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            WorkCondition::class,
            'department_id',
            'id',
            'id',
            'id'
        );
    }
}
