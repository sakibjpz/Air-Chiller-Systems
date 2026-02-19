<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLineup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'model_number',
        'brand',
        'origin',
        'warranty',
        'description',
        'features',
        'specifications',
        'applications',
        'technical_details',
        'downloads',
        'gallery_images',
        'image',
        'button_text',
        'button_link',
        'sort_order',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'features' => 'array',
        'specifications' => 'array',
        'applications' => 'array',
        'technical_details' => 'array',
        'downloads' => 'array',
        'gallery_images' => 'array'
    ];

    // Scope for active lineups
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

    // Get gallery images as array of URLs
    public function getGalleryUrlsAttribute()
    {
        if (!$this->gallery_images) {
            return [];
        }
        
        return array_map(function($image) {
            return asset($image);
        }, $this->gallery_images);
    }

    // Get features as formatted array
    public function getFeaturesListAttribute()
    {
        return $this->features ?? [
            'High efficiency performance',
            'Durable construction',
            'Easy maintenance',
            'Energy saving'
        ];
    }

    // Automatically generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($productLineup) {
            if (empty($productLineup->slug)) {
                $productLineup->slug = \Str::slug($productLineup->title);
            }
        });

        static::updating(function ($productLineup) {
            if ($productLineup->isDirty('title')) {
                $productLineup->slug = \Str::slug($productLineup->title);
            }
        });
    }
}
