<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'requirement_title',
        'requirement_description',
        'requirement_description_2',
        'requirement_description_3',
        'icon',
        'image',
        'price_range',
        'is_featured',
        'is_active',
        'sort_order',
        'meta_title',
        'meta_description',
        'service_category_id',
        'vehicle_simulation',
        'marriage_simulation',
        'property_simulation',
        'education_simulation',
        'hajj_simulation',
        'working_capital_simulation',
        'business_machine_simulation',
        'business_renovation_simulation',
        'deposit_simulation',
        'saving_simulation'


    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function serviceCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeVehicle($query)
    {
        return $query->where('vehicle_simulation', true);
    }

    public function scopeMarriage($query)
    {
        return $query->where('marriage_simulation', true);
    }

    public function scopeProperty($query)
    {
        return $query->where('property_simulation', true);
    }

    public function scopeEducation($query)
    {
        return $query->where('education_simulation', true);
    }

    public function scopeHajj($query)
    {
        return $query->where('hajj_simulation', true);
    }


    public function scopeWorkingCapital($query)
    {
        return $query->where('working_capital_simulation', true);
    }

    public function scopeBusinessMachine($query)
    {
        return $query->where('business_machine_simulation', true);
    }

    public function scopeBusinessRenovation($query)
    {
        return $query->where('business_renovation_simulation', true);
    }

    public function scopeDeposit($query)
    {
        return $query->where('deposit_simulation', true);
    }

    public function scopeSaving($query)
    {
        return $query->where('saving_simulation', true);
    }

}
