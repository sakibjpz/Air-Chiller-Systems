<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLineup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'button_text',
        'button_link',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
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

    // Get image URL - Follows your public/images/ pattern
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return null;
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