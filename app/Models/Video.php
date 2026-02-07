<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'video_url',
        'video_path',
        'video_disk',
        'video_size',
        'video_duration',
        'mime_type',
        'video_type',
        'video_id',
        'thumbnail',
        'thumbnail_disk',
        'overlay_title',
        'overlay_description',
        'button_text',
        'button_link',
        'sort_order',
        'is_active',
        'show_overlay',
        'autoplay',
        'muted',
        'loop',
        'controls',
        'playsinline',
        'show_info',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_overlay' => 'boolean',
        'autoplay' => 'boolean',
        'muted' => 'boolean',
        'loop' => 'boolean',
        'controls' => 'boolean',
        'playsinline' => 'boolean',
        'show_info' => 'boolean',
        'video_size' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            if (empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
        });

        static::updating(function ($video) {
            if ($video->isDirty('title') && empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
        });
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function scopeWithVideo($query)
    {
        return $query->where(function ($q) {
            $q->whereNotNull('video_path')
              ->orWhereNotNull('video_url');
        });
    }

    // Accessors
    public function getVideoUrlAttribute($value)
    {
        // If it's an uploaded video, generate the full URL
        if ($this->video_type === 'uploaded' && $this->video_path) {
            return asset($this->video_path);
        }
        
        return $value;
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset($this->thumbnail);
        }
        
        // Generate YouTube thumbnail URL if it's a YouTube video
        if ($this->video_type === 'youtube' && $this->video_id) {
            return "https://img.youtube.com/vi/{$this->video_id}/maxresdefault.jpg";
        }
        
        return null;
    }

    public function getFileSizeFormattedAttribute()
    {
        if (!$this->video_size) return null;
        
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = $this->video_size;
        $i = 0;
        
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getIsUploadedAttribute()
    {
        return $this->video_type === 'uploaded' && !empty($this->video_path);
    }

    public function getIsEmbeddedAttribute()
    {
        return in_array($this->video_type, ['youtube', 'vimeo']) && !empty($this->video_url);
    }

    // Helper methods
    public function isYouTube()
    {
        return $this->video_type === 'youtube';
    }

    public function isVimeo()
    {
        return $this->video_type === 'vimeo';
    }

    public function isUploaded()
    {
        return $this->video_type === 'uploaded';
    }

    public function hasOverlay()
    {
        return $this->show_overlay && ($this->overlay_title || $this->overlay_description || $this->button_text);
    }

    // Get video player attributes for HTML
    public function getVideoAttributes()
    {
        $attrs = [];
        
        if ($this->autoplay) $attrs[] = 'autoplay';
        if ($this->muted) $attrs[] = 'muted';
        if ($this->loop) $attrs[] = 'loop';
        if ($this->playsinline) $attrs[] = 'playsinline';
        if ($this->controls) $attrs[] = 'controls';
        
        return implode(' ', $attrs);
    }
    public function isEmbedded()
{
    return in_array($this->video_type, ['youtube', 'vimeo']);
}
}