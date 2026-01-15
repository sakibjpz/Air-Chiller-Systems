<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'tags',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Image URL - following your pattern
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return null;
    }

    // Get tags as array
    public function getTagsArrayAttribute()
    {
        if ($this->tags) {
            return array_map('trim', explode(',', $this->tags));
        }
        return [];
    }

    // Get categories for filtering
    public static function getCategories()
    {
        return self::whereNotNull('category')
                  ->where('category', '!=', '')
                  ->distinct()
                  ->pluck('category')
                  ->toArray();
    }
}