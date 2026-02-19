<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function index()
    {
        $settings = ContactSetting::getSettings();
        return view('frontend.contact.index', compact('settings'));
    }

    /**
     * Handle the contact form submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')
                         ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}