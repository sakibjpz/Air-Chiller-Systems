<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = Video::ordered()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created video in storage.
     */

    
    public function store(Request $request)
    
    
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_type' => 'required|in:uploaded,youtube,vimeo',
            'video_url' => 'nullable|required_if:video_type,youtube,vimeo|url',
'video_file' => 'nullable',
            'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            
            // Overlay content
            'overlay_title' => 'nullable|string|max:255',
            'overlay_description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            
            // Settings
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
            'show_overlay' => 'required|boolean',
            'autoplay' => 'required|boolean',
            'muted' => 'required|boolean',
            'loop' => 'required|boolean',
            'controls' => 'required|boolean',
            'playsinline' => 'required|boolean',
        ]);

        // Create slug
        $validated['slug'] = Str::slug($request->title);
        
        // Handle video based on type
        if ($request->video_type === 'uploaded' && $request->hasFile('video_file')) {
            $videoFile = $request->file('video_file');
            
            // Create uploads/videos directory if it doesn't exist
            $videoDir = public_path('uploads/videos');
            if (!File::exists($videoDir)) {
                File::makeDirectory($videoDir, 0755, true);
            }
            
            // Generate unique filename
            $videoName = time() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '_', $videoFile->getClientOriginalName());
            
            // Move video to public directory
            $videoFile->move($videoDir, $videoName);
            
            $validated['video_path'] = 'uploads/videos/' . $videoName;
            $validated['video_disk'] = 'public';
            $validated['video_size'] = $videoFile->getSize();
            $validated['mime_type'] = $videoFile->getMimeType();
            $validated['video_duration'] = '00:01:00'; // Default
            
        } elseif (in_array($request->video_type, ['youtube', 'vimeo'])) {
            $validated['video_url'] = $request->video_url;
            
            // Extract video ID from URL
            if ($request->video_type === 'youtube') {
                $validated['video_id'] = $this->extractYouTubeId($request->video_url);
            } elseif ($request->video_type === 'vimeo') {
                $validated['video_id'] = $this->extractVimeoId($request->video_url);
            }
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_file')) {
            $thumbnailFile = $request->file('thumbnail_file');
            
            // Create uploads/videos/thumbnails directory if it doesn't exist
            $thumbDir = public_path('uploads/videos/thumbnails');
            if (!File::exists($thumbDir)) {
                File::makeDirectory($thumbDir, 0755, true);
            }
            
            // Generate unique filename
            $thumbName = time() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '_', $thumbnailFile->getClientOriginalName());
            
            // Move thumbnail to public directory
            $thumbnailFile->move($thumbDir, $thumbName);
            
            $validated['thumbnail'] = 'uploads/videos/thumbnails/' . $thumbName;
            $validated['thumbnail_disk'] = 'public';
        }

        // Create video
        try {
    Video::create($validated);
} catch (\Exception $e) {
    dd($e->getMessage(), $validated);
}

        return redirect()->route('admin.videos.index')
                         ->with('success', 'Video created successfully!');
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, Video $video)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_type' => 'required|in:uploaded,youtube,vimeo',
            'video_url' => 'nullable|required_if:video_type,youtube,vimeo|url',
            'video_file' => 'nullable',
            'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            
            // Overlay content
            'overlay_title' => 'nullable|string|max:255',
            'overlay_description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            
            // Settings
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
            'show_overlay' => 'required|boolean',
            'autoplay' => 'required|boolean',
            'muted' => 'required|boolean',
            'loop' => 'required|boolean',
            'controls' => 'required|boolean',
            'playsinline' => 'required|boolean',
        ]);

        // Update slug if title changed
        if ($request->title != $video->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        // Handle video file update
        if ($request->video_type === 'uploaded' && $request->hasFile('video_file')) {
            // Delete old video file if exists
            if ($video->video_path && file_exists(public_path($video->video_path))) {
                unlink(public_path($video->video_path));
            }
            
            $videoFile = $request->file('video_file');
            
            // Create directory if it doesn't exist
            $videoDir = public_path('uploads/videos');
            if (!File::exists($videoDir)) {
                File::makeDirectory($videoDir, 0755, true);
            }
            
            // Generate unique filename
            $videoName = time() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '_', $videoFile->getClientOriginalName());
            
            // Move video to public directory
            $videoFile->move($videoDir, $videoName);
            
            $validated['video_path'] = 'uploads/videos/' . $videoName;
            $validated['video_disk'] = 'public';
            $validated['video_size'] = $videoFile->getSize();
            $validated['mime_type'] = $videoFile->getMimeType();
            $validated['video_duration'] = '00:01:00';
            
            // Clear URL if switching from embedded to uploaded
            $validated['video_url'] = null;
            $validated['video_id'] = null;
            
        } elseif (in_array($request->video_type, ['youtube', 'vimeo'])) {
            $validated['video_url'] = $request->video_url;
            
            // Extract video ID
            if ($request->video_type === 'youtube') {
                $validated['video_id'] = $this->extractYouTubeId($request->video_url);
            } elseif ($request->video_type === 'vimeo') {
                $validated['video_id'] = $this->extractVimeoId($request->video_url);
            }
            
            // Clear uploaded video fields if switching from uploaded to embedded
            if ($video->isUploaded()) {
                if ($video->video_path && file_exists(public_path($video->video_path))) {
                    unlink(public_path($video->video_path));
                }
                $validated['video_path'] = null;
                $validated['video_size'] = null;
                $validated['mime_type'] = null;
                $validated['video_duration'] = null;
            }
        }

        // Handle thumbnail update
        if ($request->hasFile('thumbnail_file')) {
            // Delete old thumbnail if exists
            if ($video->thumbnail && file_exists(public_path($video->thumbnail))) {
                unlink(public_path($video->thumbnail));
            }
            
            $thumbnailFile = $request->file('thumbnail_file');
            
            // Create directory if it doesn't exist
            $thumbDir = public_path('uploads/videos/thumbnails');
            if (!File::exists($thumbDir)) {
                File::makeDirectory($thumbDir, 0755, true);
            }
            
            // Generate unique filename
            $thumbName = time() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '_', $thumbnailFile->getClientOriginalName());
            
            // Move thumbnail to public directory
            $thumbnailFile->move($thumbDir, $thumbName);
            
            $validated['thumbnail'] = 'uploads/videos/thumbnails/' . $thumbName;
            $validated['thumbnail_disk'] = 'public';
        }

        // Update video
        $video->update($validated);

        return redirect()->route('admin.videos.index')
                         ->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy(Video $video)
    {
        // Delete video file if exists
        if ($video->video_path && file_exists(public_path($video->video_path))) {
            unlink(public_path($video->video_path));
        }
        
        // Delete thumbnail if exists
        if ($video->thumbnail && file_exists(public_path($video->thumbnail))) {
            unlink(public_path($video->thumbnail));
        }
        
        $video->delete();
        
        return redirect()->route('admin.videos.index')
                         ->with('success', 'Video deleted successfully!');
    }

    /**
     * Extract YouTube video ID from URL.
     */
    private function extractYouTubeId($url)
    {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Extract Vimeo video ID from URL.
     */
    private function extractVimeoId($url)
    {
        preg_match('/(?:vimeo\.com\/|player\.vimeo\.com\/video\/)([0-9]+)/', $url, $matches);
        return $matches[1] ?? null;
    }
}