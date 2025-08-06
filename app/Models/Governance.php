<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 

class Governance extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_path',
    ];

    protected $casts = [
        'description' => 'string',
    ];

    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}