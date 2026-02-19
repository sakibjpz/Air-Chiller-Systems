<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statistics' => 'nullable|array',
            'overview_cards' => 'nullable|array',
            'support_title' => 'nullable|string|max:255',
            'support_description' => 'nullable|string',
            'support_features' => 'nullable|array',
            'support_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'building_systems' => 'nullable|array',
            'chillers_title' => 'nullable|string|max:255',
            'chillers_description' => 'nullable|string',
            'chillers' => 'nullable|array',
            'central_plant_title' => 'nullable|string|max:255',
            'central_plant_description' => 'nullable|string',
            'central_plant_features' => 'nullable|array',
            'central_plant_services' => 'nullable|array',
            'central_plant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'central_plant_stats' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_link' => 'nullable|string|max:255',
            'cta_phone' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '_main_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/services'), $imageName);
            $validated['image'] = 'images/services/' . $imageName;
        }

        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            $imageName = time() . '_hero_' . $request->file('hero_image')->getClientOriginalName();
            $request->file('hero_image')->move(public_path('images/services'), $imageName);
            $validated['hero_image'] = 'images/services/' . $imageName;
        }

        // Handle support image upload
        if ($request->hasFile('support_image')) {
            $imageName = time() . '_support_' . $request->file('support_image')->getClientOriginalName();
            $request->file('support_image')->move(public_path('images/services'), $imageName);
            $validated['support_image'] = 'images/services/' . $imageName;
        }

        // Handle central plant image upload
        if ($request->hasFile('central_plant_image')) {
            $imageName = time() . '_plant_' . $request->file('central_plant_image')->getClientOriginalName();
            $request->file('central_plant_image')->move(public_path('images/services'), $imageName);
            $validated['central_plant_image'] = 'images/services/' . $imageName;
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'statistics' => 'nullable|array',
            'overview_cards' => 'nullable|array',
            'support_title' => 'nullable|string|max:255',
            'support_description' => 'nullable|string',
            'support_features' => 'nullable|array',
            'support_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'building_systems' => 'nullable|array',
            'chillers_title' => 'nullable|string|max:255',
            'chillers_description' => 'nullable|string',
            'chillers' => 'nullable|array',
            'central_plant_title' => 'nullable|string|max:255',
            'central_plant_description' => 'nullable|string',
            'central_plant_features' => 'nullable|array',
            'central_plant_services' => 'nullable|array',
            'central_plant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'central_plant_stats' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_link' => 'nullable|string|max:255',
            'cta_phone' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
            $imageName = time() . '_main_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/services'), $imageName);
            $validated['image'] = 'images/services/' . $imageName;
        }

        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            if ($service->hero_image && file_exists(public_path($service->hero_image))) {
                unlink(public_path($service->hero_image));
            }
            $imageName = time() . '_hero_' . $request->file('hero_image')->getClientOriginalName();
            $request->file('hero_image')->move(public_path('images/services'), $imageName);
            $validated['hero_image'] = 'images/services/' . $imageName;
        }

        // Handle support image upload
        if ($request->hasFile('support_image')) {
            if ($service->support_image && file_exists(public_path($service->support_image))) {
                unlink(public_path($service->support_image));
            }
            $imageName = time() . '_support_' . $request->file('support_image')->getClientOriginalName();
            $request->file('support_image')->move(public_path('images/services'), $imageName);
            $validated['support_image'] = 'images/services/' . $imageName;
        }

        // Handle central plant image upload
        if ($request->hasFile('central_plant_image')) {
            if ($service->central_plant_image && file_exists(public_path($service->central_plant_image))) {
                unlink(public_path($service->central_plant_image));
            }
            $imageName = time() . '_plant_' . $request->file('central_plant_image')->getClientOriginalName();
            $request->file('central_plant_image')->move(public_path('images/services'), $imageName);
            $validated['central_plant_image'] = 'images/services/' . $imageName;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        // Delete all associated images
        $images = [
            $service->image,
            $service->hero_image,
            $service->support_image,
            $service->central_plant_image
        ];

        foreach ($images as $image) {
            if ($image && file_exists(public_path($image))) {
                unlink(public_path($image));
            }
        }

        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted successfully!');
    }
}
