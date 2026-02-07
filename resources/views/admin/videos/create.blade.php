@extends('layouts.admin')

@section('title', 'Add Video Section')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Video Section</h1>
        <p class="text-gray-600">Create a video section for the homepage (like LG website)</p>
    </div>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.videos.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Videos
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="p-6 space-y-6">
                <!-- Basic Information -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
                    
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Video Title *
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title"
                               value="{{ old('title') }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Enter video title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description (Optional)
                        </label>
                        <textarea name="description" 
                                  id="description"
                                  rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                                  placeholder="Enter video description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Video Source -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Video Source</h3>
                    
                    <!-- Video Type -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Video Source Type *
                        </label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="video_type" value="uploaded" 
                                       {{ old('video_type', 'uploaded') == 'uploaded' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                       onclick="toggleVideoSource('uploaded')">
                                <span class="ml-2 text-gray-700">Upload Video File</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="video_type" value="youtube"
                                       {{ old('video_type') == 'youtube' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                       onclick="toggleVideoSource('youtube')">
                                <span class="ml-2 text-gray-700">YouTube URL</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="video_type" value="vimeo"
                                       {{ old('video_type') == 'vimeo' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                       onclick="toggleVideoSource('vimeo')">
                                <span class="ml-2 text-gray-700">Vimeo URL</span>
                            </label>
                        </div>
                        @error('video_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Uploaded Video File -->
                    <div id="uploaded-section" class="video-source-section">
                        <label for="video_file" class="block text-sm font-medium text-gray-700 mb-2">
                            Video File *
                        </label>
                        <div class="mt-1">
                            <input type="file" 
                                   name="video_file" 
                                   id="video_file"
                                   accept="video/mp4,video/webm,video/ogg"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                                   onchange="previewVideoFile(event)">
                            <p class="mt-2 text-sm text-gray-500">
                                Supported: MP4, WebM, OGG. Max 20MB. WebM recommended for best performance.
                            </p>
                            @error('video_file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 preview-container hidden" id="video-preview-container">
                            <video id="video-preview" class="w-full max-w-md rounded-lg" controls>
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>

                    <!-- YouTube URL -->
                    <div id="youtube-section" class="video-source-section hidden">
                        <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">
                            YouTube Video URL *
                        </label>
                       <input type="url" 
       name="video_url" 
       id="video_url"  
       value="{{ old('video_url') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="https://www.youtube.com/watch?v=..."
                               onblur="previewYouTube(this.value)">
                        <p class="mt-2 text-sm text-gray-500">
                            Enter full YouTube URL (e.g., https://www.youtube.com/watch?v=VIDEO_ID)
                        </p>
                        @error('video_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mt-4 hidden" id="youtube-preview-container">
                            <div class="w-full max-w-md aspect-video bg-gray-200 rounded-lg flex items-center justify-center">
                                <div id="youtube-preview"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Vimeo URL -->
                    <div id="vimeo-section" class="video-source-section hidden">
                        <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">
                            Vimeo Video URL *
                        </label>
                        <input type="url" 
                               name="video_url" 
                               id="vimeo_url"
                               value="{{ old('video_url') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="https://vimeo.com/..."
                               onblur="previewVimeo(this.value)">
                        <p class="mt-2 text-sm text-gray-500">
                            Enter full Vimeo URL (e.g., https://vimeo.com/VIDEO_ID)
                        </p>
                        @error('video_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mt-4 hidden" id="vimeo-preview-container">
                            <div class="w-full max-w-md aspect-video bg-gray-200 rounded-lg flex items-center justify-center">
                                <div id="vimeo-preview"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Thumbnail Image</h3>
                    <label for="thumbnail_file" class="block text-sm font-medium text-gray-700 mb-2">
                        Custom Thumbnail (Optional)
                    </label>
                    <div class="mt-1 flex items-center space-x-4">
                        <div class="flex-1">
                            <input type="file" 
                                   name="thumbnail_file" 
                                   id="thumbnail_file"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                                   onchange="previewThumbnail(event)">
                            <p class="mt-2 text-sm text-gray-500">
                                Recommended: 1280x720 pixels. If not provided, will use video frame or platform thumbnail.
                            </p>
                            @error('thumbnail_file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="preview-container hidden">
                            <div class="h-32 w-48 border-2 border-dashed border-gray-300 rounded-lg overflow-hidden bg-gray-50 flex items-center justify-center">
                                <img id="thumbnail-preview" class="max-h-full max-w-full object-contain">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Overlay Content -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Overlay Content (Like LG Website)</h3>
                    
                    <!-- Show Overlay Toggle -->
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="show_overlay" 
                                   id="show_overlay"
                                   value="1"
                                   {{ old('show_overlay', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                   onclick="toggleOverlayFields()">
                            <label for="show_overlay" class="ml-2 block text-sm text-gray-700">
                                Show Text Overlay on Video
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Display text content over the video (like LG website hero section).
                        </p>
                    </div>

                    <!-- Overlay Fields -->
                    <div id="overlay-fields">
                        <!-- Overlay Title -->
                        <div class="mb-4">
                            <label for="overlay_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Overlay Title
                            </label>
                            <input type="text" 
                                   name="overlay_title" 
                                   id="overlay_title"
                                   value="{{ old('overlay_title') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="Enter overlay title">
                            @error('overlay_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Overlay Description -->
                        <div class="mb-4">
                            <label for="overlay_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Overlay Description
                            </label>
                            <textarea name="overlay_description" 
                                      id="overlay_description"
                                      rows="2"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                                      placeholder="Enter overlay description">{{ old('overlay_description') }}</textarea>
                            @error('overlay_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Button -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">
                                    Button Text
                                </label>
                                <input type="text" 
                                       name="button_text" 
                                       id="button_text"
                                       value="{{ old('button_text') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                       placeholder="e.g., Watch More">
                                @error('button_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="button_link" class="block text-sm font-medium text-gray-700 mb-2">
                                    Button Link
                                </label>
                                <input type="url" 
                                       name="button_link" 
                                       id="button_link"
                                       value="{{ old('button_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                       placeholder="e.g., https://example.com">
                                @error('button_link')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Settings -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Video Player Settings</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Autoplay -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="autoplay" 
                                   id="autoplay"
                                   value="1"
                                   {{ old('autoplay', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="autoplay" class="ml-2 block text-sm text-gray-700">
                                Autoplay
                            </label>
                        </div>

                        <!-- Muted -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="muted" 
                                   id="muted"
                                   value="1"
                                   {{ old('muted', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="muted" class="ml-2 block text-sm text-gray-700">
                                Muted (Required for autoplay on most browsers)
                            </label>
                        </div>

                        <!-- Loop -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="loop" 
                                   id="loop"
                                   value="1"
                                   {{ old('loop', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="loop" class="ml-2 block text-sm text-gray-700">
                                Loop Video
                            </label>
                        </div>

                        <!-- Controls -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="controls" 
                                   id="controls"
                                   value="1"
                                   {{ old('controls', false) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="controls" class="ml-2 block text-sm text-gray-700">
                                Show Player Controls
                            </label>
                        </div>

                        <!-- Plays Inline -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="playsinline" 
                                   id="playsinline"
                                   value="1"
                                   {{ old('playsinline', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="playsinline" class="ml-2 block text-sm text-gray-700">
                                Plays Inline (Mobile)
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Display Settings -->
                <div class="border-b pb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Display Settings</h3>
                    
                    <!-- Sort Order -->
                    <div class="mb-4">
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Sort Order
                        </label>
                        <input type="number" 
                               name="sort_order" 
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="0">
                        <p class="mt-2 text-sm text-gray-500">
                            Lower numbers appear first on homepage.
                        </p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   id="is_active"
                                   value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">
                                Active (Show on homepage)
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            If unchecked, this video will be hidden from the homepage.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.videos.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Save Video
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Show correct video source section based on selected type
    const initialType = document.querySelector('input[name="video_type"]:checked').value;
    toggleVideoSource(initialType);
    
    // Toggle overlay fields based on checkbox
    toggleOverlayFields();
});

function toggleVideoSource(type) {
    // Hide all sections
    document.querySelectorAll('.video-source-section').forEach(section => {
        section.classList.add('hidden');
    });
    
    // Show selected section
    document.getElementById(type + '-section').classList.remove('hidden');
    
    // Clear URL fields when switching
    if (type !== 'youtube') {
        document.getElementById('video_url').value = '';
        document.getElementById('youtube-preview-container').classList.add('hidden');
    }
    if (type !== 'vimeo') {
        document.getElementById('vimeo_url').value = '';
        document.getElementById('vimeo-preview-container').classList.add('hidden');
    }
    if (type !== 'uploaded') {
        document.getElementById('video_file').value = '';
        document.getElementById('video-preview-container').classList.add('hidden');
    }
}

function toggleOverlayFields() {
    const showOverlay = document.getElementById('show_overlay').checked;
    const overlayFields = document.getElementById('overlay-fields');
    
    if (showOverlay) {
        overlayFields.style.display = 'block';
    } else {
        overlayFields.style.display = 'none';
    }
}

function previewVideoFile(event) {
    const input = event.target;
    const preview = document.getElementById('video-preview');
    const container = document.getElementById('video-preview-container');
    
    if (input.files && input.files[0]) {
        const url = URL.createObjectURL(input.files[0]);
        preview.src = url;
        container.classList.remove('hidden');
    } else {
        preview.src = '';
        container.classList.add('hidden');
    }
}

function previewThumbnail(event) {
    const input = event.target;
    const preview = document.getElementById('thumbnail-preview');
    const container = input.parentElement.nextElementSibling;
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        container.classList.add('hidden');
    }
}

function previewYouTube(url) {
    const container = document.getElementById('youtube-preview-container');
    const previewDiv = document.getElementById('youtube-preview');
    
    if (url) {
        try {
            // Extract YouTube ID
            const videoId = extractYouTubeId(url);
            if (videoId) {
                previewDiv.innerHTML = `
                    <iframe width="100%" height="100%" 
                            src="https://www.youtube.com/embed/${videoId}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                `;
                container.classList.remove('hidden');
            } else {
                container.classList.add('hidden');
            }
        } catch (e) {
            container.classList.add('hidden');
        }
    } else {
        container.classList.add('hidden');
    }
}

function previewVimeo(url) {
    const container = document.getElementById('vimeo-preview-container');
    const previewDiv = document.getElementById('vimeo-preview');
    
    if (url) {
        try {
            // Extract Vimeo ID
            const videoId = extractVimeoId(url);
            if (videoId) {
                previewDiv.innerHTML = `
                    <iframe src="https://player.vimeo.com/video/${videoId}" 
                            width="100%" height="100%" 
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                `;
                container.classList.remove('hidden');
            } else {
                container.classList.add('hidden');
            }
        } catch (e) {
            container.classList.add('hidden');
        }
    } else {
        container.classList.add('hidden');
    }
}

// Helper functions to extract video IDs
function extractYouTubeId(url) {
    const regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
    const match = url.match(regExp);
    return (match && match[2].length === 11) ? match[2] : null;
}

function extractVimeoId(url) {
    const regExp = /(?:vimeo\.com\/|player\.vimeo\.com\/video\/)([0-9]+)/;
    const match = url.match(regExp);
    return match ? match[1] : null;
}
</script>

<style>
.video-source-section {
    transition: all 0.3s ease;
}
</style>
@endsection