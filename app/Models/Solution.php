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
        'image',
        'icon',
        'sort_order',
        'is_active',
        'button_text',
        'button_link'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
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

    // Get image URL - FIXED to match your storage pattern
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

        static::creating(function ($solution) {
            if (empty($solution->slug)) {
                $solution->slug = \Str::slug($solution->title);
            }
        });
    }
}