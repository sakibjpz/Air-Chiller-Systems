<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image', // Added this line
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scope for active core values
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
            return asset('images/core-values/' . $this->image);
        }
        return null;
    }
}