@extends('layouts.admin')

@section('title', 'Solution Gallery - ' . $solution->title)

@section('content')
<div class="container-fluid px-4">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">{{ $solution->title }} - Gallery Images</h1>
            <p class="text-gray-600">Manage gallery images for this solution</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.solutions.index') }}" 
               class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Back to Solutions
            </a>
            <a href="{{ route('admin.solutions.galleries.create', $solution) }}" 
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300">
                <i class="fas fa-plus mr-2"></i>Add New Image
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6">
            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($galleries as $gallery)
                        <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset($gallery->image) }}" 
                                     alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 mb-2">{{ $gallery->title ?? 'Untitled' }}</h3>
                                @if($gallery->description)
                                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($gallery->description, 100) }}</p>
                                @endif
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">Order: {{ $gallery->sort_order }}</span>
                                    <span class="px-2 py-1 text-xs rounded-full {{ $gallery->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                                <div class="flex justify-end space-x-2 mt-4 pt-3 border-t border-gray-200">
                                    <a href="{{ route('admin.solutions.galleries.edit', [$solution, $gallery]) }}" 
                                       class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.solutions.galleries.destroy', [$solution, $gallery]) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this image?');"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-images text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Gallery Images</h3>
                    <p class="text-gray-500 mb-6">Start by adding images to this solution gallery</p>
                    <a href="{{ route('admin.solutions.galleries.create', $solution) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300">
                        <i class="fas fa-plus mr-2"></i>Add First Image
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
