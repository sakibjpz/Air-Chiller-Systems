<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    /**
     * Show the form for editing contact settings.
     */
    public function edit()
    {
        $settings = ContactSetting::getSettings();
        return view('admin.contact-settings.edit', compact('settings'));
    }

    /**
     * Update the contact settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'emergency_phone' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'monday_friday' => 'nullable|string|max:255',
            'saturday' => 'nullable|string|max:255',
            'sunday' => 'nullable|string|max:255',
            'map_embed_url' => 'nullable|string|max:1000',
            'map_direction_url' => 'nullable|string|max:1000',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        $settings = ContactSetting::getSettings();
        
        if ($settings->exists) {
            $settings->update($validated);
        } else {
            ContactSetting::create($validated);
        }

        return redirect()->route('admin.contact-settings.edit')
                         ->with('success', 'Contact settings updated successfully.');
    }
}