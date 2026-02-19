<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'features',
        'equipment',
        'statistics',
        'why_heading',
        'why_description',
        'equipment_heading',
        'expertise_heading',
        'image',
        'icon',
        'sort_order',
        'is_active',
        'button_text',
        'button_link',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'features' => 'array',
        'equipment' => 'array',
        'statistics' => 'array'
    ];

    // Scope for active solutions
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return null;
    }

    // Get features as array with defaults
    public function getFeaturesListAttribute()
    {
        return $this->features ?? [
            [
                'icon' => 'fas fa-shield-alt',
                'title' => 'Infection Control',
                'description' => 'Precise air filtration and pressure control to prevent cross-contamination'
            ],
            [
                'icon' => 'fas fa-temperature-low',
                'title' => 'Temperature Control',
                'description' => 'Critical areas require specific temperature ranges'
            ],
            [
                'icon' => 'fas fa-wind',
                'title' => 'Air Quality',
                'description' => 'HEPA filters and UVGI systems for sterile environments'
            ]
        ];
    }

    // Get equipment as array with defaults
    public function getEquipmentListAttribute()
    {
        return $this->equipment ?? [
            'Medical Grade Chillers: For MRI machines, lab equipment cooling',
            'Operating Theater AHUs: With HEPA filtration and pressure control',
            'Isolation Room Systems: Negative/positive pressure systems',
            'Central Cooling Plants: For entire complexes'
        ];
    }

    // Get statistics as array with defaults
    public function getStatisticsListAttribute()
    {
        return $this->statistics ?? [
            ['value' => '50+', 'label' => 'Facilities Served'],
            ['value' => '24/7', 'label' => 'Support Service']
        ];
    }

    // Automatically generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($solution) {
            if (empty($solution->slug)) {
                $solution->slug = \Str::slug($solution->title);
            }
        });

        static::updating(function ($solution) {
            if ($solution->isDirty('title') && empty($solution->slug)) {
                $solution->slug = \Str::slug($solution->title);
            }
        });
    }

    // Relationship with SolutionGallery
    public function galleries()
    {
        return $this->hasMany(SolutionGallery::class)->orderBy('sort_order');
    }

    // Get active galleries only
    public function activeGalleries()
    {
        return $this->hasMany(SolutionGallery::class)->where('is_active', true)->orderBy('sort_order');
    }
}