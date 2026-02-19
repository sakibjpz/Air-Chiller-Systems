@extends('layouts.admin')

@section('title', 'Edit Gallery Image - ' . $solution->title)

@section('content')
<div class="container-fluid px-4">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Edit Gallery Image</h1>
            <p class="text-gray-600">Update image for {{ $solution->title }}</p>
        </div>
        <a href="{{ route('admin.solutions.galleries.index', $solution) }}" 
           class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i>Back to Gallery
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.solutions.galleries.update', [$solution, $gallery]) }}" 
              method="POST" 
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Image Title
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $gallery->title) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="e.g., Hospital Operating Theater">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sort Order
                        </label>
                        <input type="number" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', $gallery->sort_order) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="0">
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_active" class="ml-2 text-sm font-semibold text-gray-700">
                            Active (show on website)
                        </label>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                            Gallery Image
                        </label>
                        
                        @if($gallery->image)
                            <div id="currentImageContainer" class="mb-4">
                                <img src="{{ asset($gallery->image) }}" 
                                     alt="Current Image" 
                                     class="max-h-48 rounded-lg mb-2">
                                <p class="text-sm text-gray-500">Current Image</p>
                            </div>
                        @endif
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center" 
                             id="uploadArea">
                            <input type="file" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewImage(this)">
                            <div class="space-y-2">
                                <div class="text-gray-400">
                                    <i class="fas fa-cloud-upload-alt text-4xl"></i>
                                </div>
                                <div class="text-gray-600">
                                    <button type="button" 
                                            onclick="document.getElementById('image').click()"
                                            class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Click to upload
                                    </button>
                                    <span>or drag and drop to replace</span>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                        <div id="previewContainer" class="hidden mt-4">
                            <img id="imagePreview" src="" alt="Preview" class="max-h-48 rounded-lg">
                            <button type="button" 
                                    onclick="removeImage()"
                                    class="mt-2 text-sm text-red-600 hover:text-red-800">
                                <i class="fas fa-times mr-1"></i>Remove New Image
                            </button>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description (Full Width) -->
            <div class="mb-8">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Description
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                          placeholder="Describe this image...">{{ old('description', $gallery->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i>Update Image
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('previewContainer').classList.remove('hidden');
            document.getElementById('uploadArea').classList.add('hidden');
            const currentContainer = document.getElementById('currentImageContainer');
            if (currentContainer) {
                currentContainer.classList.add('hidden');
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('previewContainer').classList.add('hidden');
    document.getElementById('uploadArea').classList.remove('hidden');
    const currentContainer = document.getElementById('currentImageContainer');
    if (currentContainer) {
        currentContainer.classList.remove('hidden');
    }
}
</script>
@endsection
