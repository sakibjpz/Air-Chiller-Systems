<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = ['New Products', 'Exhibition News', 'Company News'];
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'required|in:New Products,Exhibition News,Company News',
            'published_date' => 'required|date',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        // Handle featured image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('featured_image')) {
            $imageName = time() . '_' . $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->move(public_path('images/news'), $imageName);
            $validated['featured_image'] = 'images/news/' . $imageName;
        }

        // Handle gallery images - FOLLOWING YOUR PATTERN
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                $galleryName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/news/gallery'), $galleryName);
                $galleryPaths[] = 'images/news/gallery/' . $galleryName;
            }
            $validated['gallery'] = json_encode($galleryPaths);
        }

        // Generate slug
        $validated['slug'] = Str::slug($request->title);

        News::create($validated);

        return redirect()->route('admin.news.index')
                         ->with('success', 'News article created successfully!');
    }

    public function edit(News $news)
    {
        $categories = ['New Products', 'Exhibition News', 'Company News'];
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'required|in:New Products,Exhibition News,Company News',
            'published_date' => 'required|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        // Handle featured image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($news->featured_image && file_exists(public_path($news->featured_image))) {
                unlink(public_path($news->featured_image));
            }

            $imageName = time() . '_' . $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->move(public_path('images/news'), $imageName);
            $validated['featured_image'] = 'images/news/' . $imageName;
        } else {
            unset($validated['featured_image']);
        }

        // Handle gallery images - FOLLOWING YOUR PATTERN
        if ($request->hasFile('gallery')) {
            // Delete old gallery images if exist
            if ($news->gallery) {
                foreach (json_decode($news->gallery) as $oldImage) {
                    if (file_exists(public_path($oldImage))) {
                        unlink(public_path($oldImage));
                    }
                }
            }

            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                $galleryName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/news/gallery'), $galleryName);
                $galleryPaths[] = 'images/news/gallery/' . $galleryName;
            }
            $validated['gallery'] = json_encode($galleryPaths);
        }

        // Update slug if title changed
        if ($news->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
                         ->with('success', 'News article updated successfully!');
    }

    public function destroy(News $news)
    {
        // Delete featured image if exists
        if ($news->featured_image && file_exists(public_path($news->featured_image))) {
            unlink(public_path($news->featured_image));
        }

        // Delete gallery images if exist
        if ($news->gallery) {
            foreach (json_decode($news->gallery) as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')
                         ->with('success', 'News article deleted successfully!');
    }
}