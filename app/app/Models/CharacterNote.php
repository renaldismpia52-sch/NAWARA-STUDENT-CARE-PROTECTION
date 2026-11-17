<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterNote extends Model
{
    protected $fillable = [
        'user_id',
        'counselor_id',
        'category',
        'note',
        'note_date',
    ];

    protected function casts(): array
    {
        return [
            'note_date' => 'date',
        ];
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function counselor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'counselor_id');
    }
}
