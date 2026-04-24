<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'is_active',
        'order',
        'max_apply',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    /**
     * Get the current number of applications
     */
    public function getCurrentApplicationsCountAttribute()
    {
        return $this->applications()->count();
    }

    /**
     * Check if the job vacancy is closed due to max applications
     */
    public function getIsClosedAttribute()
    {
        if (! $this->is_active) {
            return true;
        }

        if ($this->max_apply && $this->current_applications_count >= $this->max_apply) {
            return true;
        }

        return false;
    }

    /**
     * Automatically close the job vacancy if max applications reached
     */
    public function checkAndCloseIfMaxReached()
    {
        if ($this->max_apply && $this->current_applications_count >= $this->max_apply) {
            $this->update(['is_active' => false]);

            return true;
        }

        return false;
    }
}
