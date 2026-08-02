<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function jobApplyForms()
    {
        return $this->hasMany(JobApplyForm::class, 'applicant_job_title', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($jobOpenings) {
            // Delete the related posts
            $jobOpenings->jobApplyForms()->delete();
        });
    }
}
