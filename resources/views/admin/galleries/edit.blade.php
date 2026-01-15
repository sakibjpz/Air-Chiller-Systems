@extends('layouts.admin')

@section('title', 'Edit Gallery Image')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Edit Gallery Image</h1>
        <p class="text-gray-600">Update gallery image details</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Current Image -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Current Image
                    </label>
                    <div class="flex items-center space-x-4">
                        @if($gallery->image)
                            <div class="relative">
                                <img src="{{ asset($gallery->image) }}" 
                                     alt="{{ $gallery->title ?: 'Gallery Image' }}" 
                                     class="w-40 h-40 object-cover rounded-lg border-2 border-blue-200">
                                <a href="{{ asset($gallery->image) }}" 
                                   target="_blank"
                                   class="absolute bottom-2 right-2 bg-blue-600 text-white p-1 rounded-full">
                                    <i class="fas fa-expand text-xs"></i>
                                </a>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-2">Upload new image to replace</p>
                            </div>
                        @else
                            <div class="text-center w-full">
                                <div class="w-40 h-40 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-image text-gray-400 text-3xl"></i>
                                </div>
                                <p class="text-sm text-gray-500">No image uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                        Title (Optional)
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $gallery->title) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                           placeholder="e.g., Project Completion, Office Event">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Description (Optional)
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="2"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                              placeholder="Brief description of the image...">{{ old('description', $gallery->description) }}</textarea>
                </div>

                <!-- Category & Tags -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                            Category (Optional)
                        </label>
                        <input type="text" 
                               id="category" 
                               name="category" 
                               value="{{ old('category', $gallery->category) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="e.g., Projects, Office, Events">
                    </div>

                    <div>
                        <label for="tags" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tags (Optional)
                        </label>
                        <input type="text" 
                               id="tags" 
                               name="tags" 
                               value="{{ old('tags', $gallery->tags) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="comma, separated, tags">
                    </div>
                </div>

                <!-- New Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                        New Image (Optional)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition duration-300">
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               class="w-full">
                        <p class="text-xs text-gray-400 mt-2">Leave empty to keep current image</p>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order & Status -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sort Order
                        </label>
                        <input type="number" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', $gallery->sort_order) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               min="0">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Status
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', $gallery->is_active) == '1' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="0" 
                                       {{ old('is_active', $gallery->is_active) == '0' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.galleries.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
                        <i class="fas fa-save mr-2"></i>Update Image
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection