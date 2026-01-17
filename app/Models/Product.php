<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'features',  // Added this
        'image',
        'category',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',  // Added this
        'is_active' => 'boolean',
    ];

    // Get active products
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get products by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Order by sort order
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }

    // Get features as array (with fallback)
    public function getFeaturesArrayAttribute()
    {
        if ($this->features && is_array($this->features)) {
            return $this->features;
        }
        
        // Fallback: extract from description or return default features
        return [
            'High Efficiency Performance',
            'Energy Saving Technology',
            'Durable Construction',
            'Easy Maintenance',
            'Industry Certified'
        ];
    }
}