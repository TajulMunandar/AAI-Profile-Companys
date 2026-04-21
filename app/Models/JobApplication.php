<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_vacancy_id',
        'name',
        'address',
        'email',
        'cv_file',
    ];

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
