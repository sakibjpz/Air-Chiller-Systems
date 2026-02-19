<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'image',
        'icon',
        'hero_title',
        'hero_description',
        'hero_image',
        'statistics',
        'overview_cards',
        'support_title',
        'support_description',
        'support_features',
        'support_image',
        'building_systems',
        'chillers_title',
        'chillers_description',
        'chillers',
        'central_plant_title',
        'central_plant_description',
        'central_plant_features',
        'central_plant_services',
        'central_plant_image',
        'central_plant_stats',
        'cta_title',
        'cta_description',
        'cta_button_text',
        'cta_button_link',
        'cta_phone',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'statistics' => 'array',
        'overview_cards' => 'array',
        'support_features' => 'array',
        'building_systems' => 'array',
        'chillers' => 'array',
        'central_plant_features' => 'array',
        'central_plant_services' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return null;
    }

    public function getHeroImageUrlAttribute()
    {
        if ($this->hero_image) {
            return asset($this->hero_image);
        }
        return null;
    }

    public function getSupportImageUrlAttribute()
    {
        if ($this->support_image) {
            return asset($this->support_image);
        }
        return null;
    }

    public function getCentralPlantImageUrlAttribute()
    {
        if ($this->central_plant_image) {
            return asset($this->central_plant_image);
        }
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = \Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('title')) {
                $service->slug = \Str::slug($service->title);
            }
        });
    }
}
