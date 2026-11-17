<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentImportBatchItem extends Model
{
    protected $fillable = [
        'batch_id',
        'row_number',
        'user_id',
        'email',
        'status',
        'email_sent_at',
        'error_message',
        'temporary_password',
    ];

    protected function casts(): array
    {
        return [
            'email_sent_at' => 'datetime',
            'temporary_password' => 'encrypted',
        ];
    }

    public function batch(): BelongsTo
    {
        return $this->belongsTo(StudentImportBatch::class, 'batch_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
