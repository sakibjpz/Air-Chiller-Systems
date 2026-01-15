<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::orderBy('sort_order')->get();
        return view('admin.core-values.index', compact('coreValues'));
    }

    public function create()
    {
        return view('admin.core-values.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
           'image' => 'nullable',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'core-value-' . time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            // Create directory if not exists
            $directory = public_path('images/core-values');
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            
            // Move image to public folder
            $image->move($directory, $imageName);
            $validated['image'] = $imageName;
        }

        CoreValue::create($validated);

        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core value added successfully.');
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core-values.edit', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'core-value-' . time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            // Create directory if not exists
            $directory = public_path('images/core-values');
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            
            // Delete old image if exists
            if ($coreValue->image && file_exists(public_path('images/core-values/' . $coreValue->image))) {
                unlink(public_path('images/core-values/' . $coreValue->image));
            }
            
            // Move new image to public folder
            $image->move($directory, $imageName);
            $validated['image'] = $imageName;
        } else {
            // Keep existing image if no new image uploaded
            unset($validated['image']);
        }

        $coreValue->update($validated);

        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core value updated successfully.');
    }

    public function destroy(CoreValue $coreValue)
    {
        // Delete image if exists
        if ($coreValue->image && file_exists(public_path('images/core-values/' . $coreValue->image))) {
            unlink(public_path('images/core-values/' . $coreValue->image));
        }
        
        $coreValue->delete();
        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core value deleted successfully.');
    }
}