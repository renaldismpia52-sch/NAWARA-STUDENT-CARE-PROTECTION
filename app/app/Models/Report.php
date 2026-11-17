<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'is_anonymous',
        'report_code',
        'bullying_type',
        'incident_description',
        'incident_location',
        'incident_date',
        'status',
        'handling_notes',
    ];

    protected function casts(): array
    {
        return [
            'is_anonymous' => 'boolean',
            'incident_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function histories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReportStatusHistory::class)->latest();
    }
}
