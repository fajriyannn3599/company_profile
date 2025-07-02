<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected $fillable = [
        'job_listing_id',
        'name',
        'email',
        'phone',
        'cover_letter',
        'resume_path',
        'portfolio_url',
        'status',
        'notes'
    ];

    public function jobListing(): BelongsTo
    {
        return $this->belongsTo(JobListing::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
