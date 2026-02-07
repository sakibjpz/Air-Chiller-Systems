@extends('layouts.admin')

@section('title', 'Manage Videos')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Video Sections</h1>
                <p class="text-gray-600">Manage video sections for homepage (like LG website)</p>
            </div>
            <a href="{{ route('admin.videos.create') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-plus mr-2"></i>Add New Video
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- No Videos Message -->
    @if($videos->isEmpty())
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-12 text-center">
                <div class="mx-auto w-24 h-24 mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-video text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No videos found</h3>
                <p class="text-gray-500 mb-6">Get started by adding your first video section for the homepage.</p>
                <a href="{{ route('admin.videos.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i>Add Your First Video
                </a>
            </div>
        </div>
    @else
        <!-- Videos Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Preview
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Video Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($videos as $video)
                        <tr class="hover:bg-gray-50 transition">
                            <!-- Thumbnail Preview -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($video->thumbnail_url)
                                    <div class="w-24 h-16 rounded overflow-hidden border border-gray-200">
                                        <img src="{{ $video->thumbnail_url }}" 
                                             alt="{{ $video->title }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-24 h-16 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                        <i class="fas fa-video text-gray-400"></i>
                                    </div>
                                @endif
                            </td>

                            <!-- Video Details -->
                            <td class="px-6 py-4">
                                <div class="mb-1">
                                    <span class="font-medium text-gray-900">{{ $video->title }}</span>
                                    @if($video->overlay_title && $video->show_overlay)
                                        <span class="ml-2 text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
                                            <i class="fas fa-text-height mr-1"></i>Overlay
                                        </span>
                                    @endif
                                </div>
                                
                                @if($video->description)
                                    <p class="text-sm text-gray-500 mb-2">{{ Str::limit($video->description, 60) }}</p>
                                @endif
                                
                                <div class="text-xs text-gray-400">
                                    @if($video->isUploaded() && $video->video_path)
                                        <span class="inline-flex items-center mr-3">
                                            <i class="fas fa-file-video mr-1"></i>
                                            {{ $video->file_size_formatted ?? 'N/A' }}
                                        </span>
                                    @elseif($video->isEmbedded())
                                        <span class="inline-flex items-center">
                                            <i class="fas fa-link mr-1"></i>
                                            {{ $video->video_type === 'youtube' ? 'YouTube' : 'Vimeo' }}
                                        </span>
                                    @endif
                                    <span class="inline-flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        {{ $video->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </td>

                            <!-- Video Type -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($video->video_type === 'youtube')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fab fa-youtube mr-1"></i>YouTube
                                    </span>
                                @elseif($video->video_type === 'vimeo')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fab fa-vimeo-v mr-1"></i>Vimeo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-upload mr-1"></i>Uploaded
                                    </span>
                                @endif
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($video->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>Inactive
                                    </span>
                                @endif
                                
                                <!-- Autoplay Indicator -->
                                @if($video->autoplay)
                                    <div class="mt-1 text-xs text-gray-500">
                                        <i class="fas fa-play mr-1"></i>Autoplay
                                    </div>
                                @endif
                            </td>

                            <!-- Sort Order -->
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                {{ $video->sort_order }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-3">
                                    <!-- View on Site Button (if active) -->
                                    @if($video->is_active)
                                        <a href="{{ route('home') }}#video-section" 
                                           target="_blank"
                                           class="text-green-600 hover:text-green-900"
                                           title="View on homepage">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endif
                                    
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.videos.edit', $video) }}" 
                                       class="text-blue-600 hover:text-blue-900"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.videos.destroy', $video) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            @if($videos->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $videos->links() }}
                </div>
            @endif
        </div>

        <!-- Stats Summary -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-video text-blue-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $videos->count() }}</h3>
                        <p class="text-sm text-gray-500">Total Videos</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $videos->where('is_active', true)->count() }}</h3>
                        <p class="text-sm text-gray-500">Active Videos</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-upload text-purple-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $videos->where('video_type', 'uploaded')->count() }}</h3>
                        <p class="text-sm text-gray-500">Uploaded Videos</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this video? This action cannot be undone.');
}

// Toggle video preview on row hover
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const videoId = row.dataset.videoId;
        if (!videoId) return;
        
        let previewTimer;
        
        row.addEventListener('mouseenter', function() {
            previewTimer = setTimeout(() => {
                // Show video preview tooltip
                showVideoPreview(videoId, row);
            }, 500);
        });
        
        row.addEventListener('mouseleave', function() {
            clearTimeout(previewTimer);
            hideVideoPreview();
        });
    });
});

function showVideoPreview(videoId, row) {
    // Implementation for hover preview (optional enhancement)
    console.log('Show preview for video:', videoId);
}

function hideVideoPreview() {
    // Hide preview tooltip
}
</script>

<style>
/* Custom styles for better table appearance */
table {
    min-width: 100%;
}

tbody tr {
    transition: background-color 0.2s ease;
}

/* Ensure text doesn't overflow */
td {
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    table {
        display: block;
        overflow-x: auto;
    }
}
</style>
@endsection