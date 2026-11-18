<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
    protected $fillable = [
        'user_id',
        'counselor_id',
        'is_anonymous',
        'title',
        'content',
        'status',
        'counselor_reply',
        'replied_at',
    ];

    protected function casts(): array
    {
        return [
            'is_anonymous' => 'boolean',
            'replied_at' => 'datetime',
        ];
    }

    public function counselor(): BelongsTo
{
    return $this->belongsTo(User::class, 'counselor_id');
}

public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
