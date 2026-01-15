<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/certifications'), $imageName);
            $validated['image'] = 'images/certifications/' . $imageName;
        }

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')
                         ->with('success', 'Certification added successfully!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/certifications'), $imageName);
            $validated['image'] = 'images/certifications/' . $imageName;
            
            // Delete old image if exists
            if ($certification->image && file_exists(public_path($certification->image))) {
                unlink(public_path($certification->image));
            }
        } else {
            unset($validated['image']);
        }

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')
                         ->with('success', 'Certification updated successfully!');
    }

    public function destroy(Certification $certification)
    {
        // Delete image if exists
        if ($certification->image && file_exists(public_path($certification->image))) {
            unlink(public_path($certification->image));
        }
        
        $certification->delete();
        
        return redirect()->route('admin.certifications.index')
                         ->with('success', 'Certification deleted successfully!');
    }
}