<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'gender', 'email', 'password', 'nis', 'verification_status', 'verified_by', 'verified_at', 'cohort_year'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'must_change_password' => 'boolean',
        ];
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, array_map('trim', explode(',', $this->role ?? '')), true);
    }

    public function isMurid(): bool
    {
        return $this->hasRole('murid');
    }

    public function isGuruBK(): bool
    {
        return $this->hasRole('guru_bk');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isKepsek(): bool
    {
        return $this->hasRole('kepsek');
    }

    public function isTimAntiBullying(): bool
    {
        return $this->hasRole('tim_anti_bullying');
    }

    public function studentClassHistories(): HasMany
    {
        return $this->hasMany(StudentClassHistory::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function studentImportBatches(): HasMany
    {
        return $this->hasMany(StudentImportBatch::class);
    }

    public function personnelAssignments(): HasMany
    {
        return $this->hasMany(PersonnelAssignment::class);
    }

}
