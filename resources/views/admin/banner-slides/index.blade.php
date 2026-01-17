@extends('layouts.admin')

@section('title', 'Manage Banner Slides')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Banner Slides</h1>
                <p class="text-gray-600">Manage homepage banner slides</p>
            </div>
            <a href="{{ route('admin.banner-slides.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i>
                Add New Slide
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Slides Grid -->
    @if($slides->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($slides as $slide)
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <!-- Slide Image -->
            <div class="relative h-48 overflow-hidden">
                @if($slide->image_url)
                <img src="{{ $slide->image_url }}" 
                     alt="{{ $slide->title }}"
                     class="w-full h-full object-cover">
                @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-3xl"></i>
                </div>
                @endif
                <div class="absolute top-3 right-3">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $slide->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $slide->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
            
            <!-- Slide Info -->
            <div class="p-4">
                <h3 class="font-bold text-gray-900 mb-2 truncate">{{ $slide->title }}</h3>
                @if($slide->subtitle)
                <p class="text-sm text-gray-600 mb-3">{{ $slide->subtitle }}</p>
                @endif
                
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span>Order: {{ $slide->sort_order }}</span>
                    <span>{{ $slide->created_at->format('M d, Y') }}</span>
                </div>
                
                <!-- Actions -->
                <div class="flex space-x-2">
                    <a href="{{ route('admin.banner-slides.edit', $slide) }}" 
                       class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                    <form action="{{ route('admin.banner-slides.destroy', $slide) }}" 
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this slide?')"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-3 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700 transition">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Empty State -->
    <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <div class="text-gray-400 mb-4">
            <i class="fas fa-images text-4xl"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No Banner Slides</h3>
        <p class="text-gray-500 mb-6">Add your first banner slide to display on the homepage.</p>
        <a href="{{ route('admin.banner-slides.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>
            Create First Slide
        </a>
    </div>
    @endif
</div>
@endsection