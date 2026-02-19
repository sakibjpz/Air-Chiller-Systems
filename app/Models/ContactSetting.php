<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Hero Section
        'hero_title',
        'hero_subtitle',
        'hero_support_text',
        
        // Form Section
        'form_title',
        'form_subtitle',
        
        // Form Fields
        'field_name_label',
        'field_name_placeholder',
        'field_email_label',
        'field_email_placeholder',
        'field_email_optional_text',
        'field_phone_label',
        'field_phone_placeholder',
        'field_message_label',
        'field_message_placeholder',
        'field_message_optional_text',
        'submit_button_text',
        
        // Map Section
        'map_title',
        'map_subtitle',
        'address_title',
        'directions_title',
        'directions_link_text',
        
        // Call Us section
        'call_us_title',
        'call_us_description',
        'call_us_phone',
        
        // Email Us section
        'email_us_title',
        'email_us_description',
        'email_us_address',
        
        // Visit Our Office section
        'office_title',
        'office_description',
        'office_address',
        
        // Business Hours section
        'hours_title',
        'monday_friday_label',
        'monday_friday_hours',
        'saturday_label',
        'saturday_hours',
        'sunday_label',
        'sunday_hours',
        'emergency_note',
        
        // Keep existing fields
        'phone',
        'email',
        'emergency_phone',
        'whatsapp',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'monday_friday',
        'saturday',
        'sunday',
        'map_embed_url',
        'map_direction_url',
        'facebook',
        'linkedin',
        'twitter',
        'instagram',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    // Get the first settings record (there should only be one)
    public static function getSettings()
    {
        return self::first() ?? new self();
    }
}