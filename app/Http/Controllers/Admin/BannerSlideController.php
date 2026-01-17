<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSlide;
use Illuminate\Http\Request;

class BannerSlideController extends Controller
{
    public function index()
    {
        $slides = BannerSlide::ordered()->get();
        return view('admin.banner-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.banner-slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/banner'), $imageName);
            $validated['image'] = 'images/banner/' . $imageName;
        }

        BannerSlide::create($validated);

        return redirect()->route('admin.banner-slides.index')
                         ->with('success', 'Banner slide created successfully!');
    }

    public function edit(BannerSlide $bannerSlide)
    {
        return view('admin.banner-slides.edit', compact('bannerSlide'));
    }

    public function update(Request $request, BannerSlide $bannerSlide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($bannerSlide->image && file_exists(public_path($bannerSlide->image))) {
                unlink(public_path($bannerSlide->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/banner'), $imageName);
            $validated['image'] = 'images/banner/' . $imageName;
        } else {
            unset($validated['image']);
        }

        $bannerSlide->update($validated);

        return redirect()->route('admin.banner-slides.index')
                         ->with('success', 'Banner slide updated successfully!');
    }

    public function destroy(BannerSlide $bannerSlide)
    {
        // Delete image if exists
        if ($bannerSlide->image && file_exists(public_path($bannerSlide->image))) {
            unlink(public_path($bannerSlide->image));
        }
        
        $bannerSlide->delete();
        
        return redirect()->route('admin.banner-slides.index')
                         ->with('success', 'Banner slide deleted successfully!');
    }
}