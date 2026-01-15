@extends('layouts.admin')

@section('title', 'Add Product Lineup')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Add New Product</h1>
        <p class="text-gray-600">Add a product to the "Other Products" lineup</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.product-lineups.store') }}" method="POST" enctype="multipart/form-data" id="productLineupForm">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Title *
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="e.g., VRF System, Single Split"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button Text -->
                    <div>
                        <label for="button_text" class="block text-sm font-semibold text-gray-700 mb-2">
                            Button Text
                        </label>
                        <input type="text" 
                               id="button_text" 
                               name="button_text" 
                               value="{{ old('button_text', 'LEARN MORE') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="LEARN MORE">
                    </div>

                    <!-- Button Link -->
                    <div>
                        <label for="button_link" class="block text-sm font-semibold text-gray-700 mb-2">
                            Button Link
                        </label>
                        <input type="url" 
                               id="button_link" 
                               name="button_link" 
                               value="{{ old('button_link') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="https://example.com/product">
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sort Order
                        </label>
                        <input type="number" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', 0) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               min="0">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                            Image *
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-300">
                            <div id="imagePreview" class="mb-4 hidden">
                                <img id="previewImage" class="mx-auto h-32 w-32 object-cover rounded-lg">
                                <button type="button" 
                                        onclick="removeImage()"
                                        class="mt-2 text-sm text-red-600 hover:text-red-800">
                                    <i class="fas fa-times mr-1"></i> Remove Image
                                </button>
                            </div>
                            <div id="uploadArea" class="mb-4">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500">Click to upload or drag and drop</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                            </div>
                            <input type="file" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewFile()"
                                   required>
                            <button type="button" 
                                    onclick="document.getElementById('image').click()"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                                Choose Image
                            </button>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Status *
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                                       required>
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="0" 
                                       {{ old('is_active') == '0' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Description
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="3"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                          placeholder="Enter product description...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.product-lineups.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i>Save Product
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let selectedFile = null;

function previewFile() {
    const fileInput = document.getElementById('image');
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const file = fileInput.files[0];
    
    if (file) {
        // Store the file
        selectedFile = file;
        
        const reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
            previewContainer.classList.remove('hidden');
            uploadArea.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        removeImage();
    }
}

function removeImage() {
    const fileInput = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    
    // Clear the file input
    fileInput.value = '';
    selectedFile = null;
    
    // Hide preview, show upload area
    previewContainer.classList.add('hidden');
    uploadArea.classList.remove('hidden');
}

// Clear file input on form reset
document.getElementById('productLineupForm').addEventListener('reset', function() {
    removeImage();
});
</script>
@endsection