@extends('layouts.admin')

@section('title', 'Contact Page Settings')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Contact Page Settings</h2>
        <p class="text-gray-600 mt-1">Manage all content displayed on your contact page.</p>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.contact-settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Hero Section -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Hero Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Get In Touch">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $settings->hero_subtitle) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Have questions about our engineering solutions? We're here to help.">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Support Text</label>
                    <input type="text" name="hero_support_text" value="{{ old('hero_support_text', $settings->hero_support_text) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="24/7 Technical Support Available">
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Contact Form</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Form Title</label>
                    <input type="text" name="form_title" value="{{ old('form_title', $settings->form_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Send us a Message">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Form Subtitle</label>
                    <input type="text" name="form_subtitle" value="{{ old('form_subtitle', $settings->form_subtitle) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Fill out the form below and our team will get back to you shortly.">
                </div>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Form Field Labels</h3>
            
            <!-- Name Field -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name Field Label</label>
                    <input type="text" name="field_name_label" value="{{ old('field_name_label', $settings->field_name_label) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Full Name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name Field Placeholder</label>
                    <input type="text" name="field_name_placeholder" value="{{ old('field_name_placeholder', $settings->field_name_placeholder) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter your full name">
                </div>
            </div>

            <!-- Email Field -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Field Label</label>
                    <input type="text" name="field_email_label" value="{{ old('field_email_label', $settings->field_email_label) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Email Address">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Placeholder</label>
                    <input type="text" name="field_email_placeholder" value="{{ old('field_email_placeholder', $settings->field_email_placeholder) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter your email address">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Optional Text</label>
                    <input type="text" name="field_email_optional_text" value="{{ old('field_email_optional_text', $settings->field_email_optional_text) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Optional">
                </div>
            </div>

            <!-- Phone Field -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Field Label</label>
                    <input type="text" name="field_phone_label" value="{{ old('field_phone_label', $settings->field_phone_label) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Contact Number">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Placeholder</label>
                    <input type="text" name="field_phone_placeholder" value="{{ old('field_phone_placeholder', $settings->field_phone_placeholder) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter your contact number">
                </div>
            </div>

            <!-- Message Field -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message Field Label</label>
                    <input type="text" name="field_message_label" value="{{ old('field_message_label', $settings->field_message_label) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Your Message">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message Placeholder</label>
                    <input type="text" name="field_message_placeholder" value="{{ old('field_message_placeholder', $settings->field_message_placeholder) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Write your message here...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message Optional Text</label>
                    <input type="text" name="field_message_optional_text" value="{{ old('field_message_optional_text', $settings->field_message_optional_text) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Optional">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Submit Button Text</label>
                    <input type="text" name="submit_button_text" value="{{ old('submit_button_text', $settings->submit_button_text) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Send Message">
                </div>
            </div>
        </div>

        <!-- Call Us Section -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Call Us Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="call_us_title" value="{{ old('call_us_title', $settings->call_us_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Call Us">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <input type="text" name="call_us_description" value="{{ old('call_us_description', $settings->call_us_description) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Available 24/7 for emergencies">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="text" name="call_us_phone" value="{{ old('call_us_phone', $settings->call_us_phone) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="+880 (121) 456 77">
                </div>
            </div>
        </div>

        <!-- Email Us Section -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Email Us Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="email_us_title" value="{{ old('email_us_title', $settings->email_us_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Email Us">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <input type="text" name="email_us_description" value="{{ old('email_us_description', $settings->email_us_description) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="General inquiries & support">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email_us_address" value="{{ old('email_us_address', $settings->email_us_address) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="info@example.com">
                </div>
            </div>
        </div>

        <!-- Office Section -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Visit Our Office</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="office_title" value="{{ old('office_title', $settings->office_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Visit Our Office">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <input type="text" name="office_description" value="{{ old('office_description', $settings->office_description) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Corporate headquarters">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Address</label>
                    <textarea name="office_address" rows="3" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                              placeholder="123 Engineering Road, Industrial Zone&#10;Dhaka, Bangladesh">{{ old('office_address', $settings->office_address) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Business Hours -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Business Hours</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                    <input type="text" name="hours_title" value="{{ old('hours_title', $settings->hours_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Business Hours">
                </div>
                <div class="md:col-span-2">
                    <h4 class="font-medium text-gray-700 mb-2">Monday - Friday</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="monday_friday_label" value="{{ old('monday_friday_label', $settings->monday_friday_label) }}" 
                               class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="Monday - Friday">
                        <input type="text" name="monday_friday_hours" value="{{ old('monday_friday_hours', $settings->monday_friday_hours) }}" 
                               class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="9:00 AM - 6:00 PM">
                    </div>
                </div>
                <div class="md:col-span-2">
                    <h4 class="font-medium text-gray-700 mb-2">Saturday</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="saturday_label" value="{{ old('saturday_label', $settings->saturday_label) }}" 
                               class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="Saturday">
                        <input type="text" name="saturday_hours" value="{{ old('saturday_hours', $settings->saturday_hours) }}" 
                               class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="10:00 AM - 4:00 PM">
                    </div>
                </div>
                <div class="md:col-span-2">
                    <h4 class="font-medium text-gray-700 mb-2">Sunday</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="sunday_label" value="{{ old('sunday_label', $settings->sunday_label) }}" 
                               class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="Sunday">
                        <input type="text" name="sunday_hours" value="{{ old('sunday_hours', $settings->sunday_hours) }}" 
                               class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="Emergency Only">
                    </div>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Emergency Note</label>
                    <input type="text" name="emergency_note" value="{{ old('emergency_note', $settings->emergency_note) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="For emergency services outside business hours, call our 24/7 support line.">
                </div>
            </div>
        </div>

        <!-- Map Settings -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Map Section</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Map Title</label>
                    <input type="text" name="map_title" value="{{ old('map_title', $settings->map_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Find Us on Map">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Map Subtitle</label>
                    <input type="text" name="map_subtitle" value="{{ old('map_subtitle', $settings->map_subtitle) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Visit our headquarters at Mohiuddin Engineering Limited">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Maps Embed URL</label>
                    <input type="url" name="map_embed_url" value="{{ old('map_embed_url', $settings->map_embed_url) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="https://www.google.com/maps/embed?pb=...">
                    <p class="text-xs text-gray-500 mt-1">Paste the embed URL from Google Maps</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Maps Directions URL</label>
                    <input type="url" name="map_direction_url" value="{{ old('map_direction_url', $settings->map_direction_url) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="https://maps.google.com/?q=...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Address Title</label>
                    <input type="text" name="address_title" value="{{ old('address_title', $settings->address_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Address">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Directions Title</label>
                    <input type="text" name="directions_title" value="{{ old('directions_title', $settings->directions_title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Map Directions">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Directions Link Text</label>
                    <input type="text" name="directions_link_text" value="{{ old('directions_link_text', $settings->directions_link_text) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Get Directions on Google Maps">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Save All Settings
            </button>
        </div>
    </form>
</div>
@endsection