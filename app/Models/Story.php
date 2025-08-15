<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'description',
        'image',
        'is_active',
        'sort_order'
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}