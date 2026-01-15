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
        'image',
        'category',
        'sort_order',
        'is_active',
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
}