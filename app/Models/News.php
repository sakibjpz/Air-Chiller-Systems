<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'published_date',
        'is_featured',
        'is_published',
        'views',
        'gallery',
        'author',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'gallery' => 'array',
        'views' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = \Str::slug($news->title);
            }
        });
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeRecent($query, $limit = 6)
    {
        return $query->orderBy('published_date', 'desc')->limit($limit);
    }

    // Accessors
public function getFeaturedImageUrlAttribute()
{
    if ($this->featured_image) {
        return asset($this->featured_image);
    }
    return asset('images/default-news.jpg');
}

   public function getGalleryUrlsAttribute()
{
    if ($this->gallery) {
        return array_map(function ($image) {
            return asset($image);
        }, $this->gallery);
    }
    return [];
}

    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);
        return $minutes . ' min read';
    }

    public function getFormattedDateAttribute()
    {
        return $this->published_date->format('F d, Y');
    }

    // Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }
}