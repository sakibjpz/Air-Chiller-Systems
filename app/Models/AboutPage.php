<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $table = 'about_pages';

    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_stats',
        'overview_title',
        'overview_description',
        'overview_image',
        'overview_badge_text',
        'overview_badge_value',
        'overview_philosophy_title',
        'overview_philosophy_text',
        'overview_philosophy_icon',
        'vision_title',
        'vision_description',
        'vision_icon',
        'vision_points',
        'mission_title',
        'mission_description',
        'mission_icon',
        'mission_points',
        'scope_sections',
        'modification_services',
        'service_support',
        'cta_title',
        'cta_description',
        'cta_primary_button_text',
        'cta_primary_button_link',
        'cta_secondary_button_text',
        'cta_secondary_button_link',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'hero_stats' => 'array',
        'vision_points' => 'array',
        'mission_points' => 'array',
        'scope_sections' => 'array',
        'modification_services' => 'array',
        'service_support' => 'array'
    ];

    public function getHeroImageUrlAttribute()
    {
        if ($this->hero_image) {
            return asset($this->hero_image);
        }
        return null;
    }

    public function getOverviewImageUrlAttribute()
    {
        if ($this->overview_image) {
            return asset($this->overview_image);
        }
        return null;
    }
}
