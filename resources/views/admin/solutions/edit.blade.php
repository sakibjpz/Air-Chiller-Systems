@extends('layouts.admin')

@section('title', 'Edit Solution')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Edit Solution</h1>
        <p class="text-gray-600">Update solution details</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.solutions.update', $solution) }}" method="POST" enctype="multipart/form-data" id="solutionForm">
            @csrf
            @method('PUT')
            
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
                               value="{{ old('title', $solution->title) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="e.g., Residence, Retail, Office"
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
                               value="{{ old('button_text', $solution->button_text) }}"
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
                               value="{{ old('button_link', $solution->button_link) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="https://example.com/page">
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                            Font Awesome Icon
                        </label>
                        <input type="text" 
                               id="icon" 
                               name="icon" 
                               value="{{ old('icon', $solution->icon) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               placeholder="fas fa-home">
                        <p class="mt-1 text-xs text-gray-500">
                            Example: fas fa-home, fas fa-store, fas fa-building
                        </p>
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sort Order
                        </label>
                        <input type="number" 
                               id="sort_order" 
                               name="sort_order" 
                               value="{{ old('sort_order', $solution->sort_order) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                               min="0">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Current Image -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Current Image
                        </label>
                        <div class="flex items-center space-x-4">
                            @if($solution->image)
                                <div class="relative">
                                    <img src="{{ asset($solution->image) }}" 
                                         alt="{{ $solution->title }}" 
                                         class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200">
                                    <a href="{{ asset($solution->image) }}" 
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
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <i class="fas fa-image text-gray-400 text-3xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-500">No image uploaded</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- New Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                            New Image (Optional)
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition duration-300">
                            <div id="imagePreview" class="mb-3 hidden">
                                <img id="previewImage" class="mx-auto h-24 w-24 object-cover rounded-lg">
                            </div>
                            <input type="file" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewFile()">
                            <button type="button" 
                                    onclick="document.getElementById('image').click()"
                                    class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm">
                                <i class="fas fa-upload mr-2"></i>Upload New Image
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
                                       {{ old('is_active', $solution->is_active) == '1' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                                       required>
                                <span class="ml-2 text-gray-700">Active</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" 
                                       name="is_active" 
                                       value="0" 
                                       {{ old('is_active', $solution->is_active) == '0' ? 'checked' : '' }}
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
                          placeholder="Enter solution description...">{{ old('description', $solution->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.solutions.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i>Update Solution
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewFile() {
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('imagePreview');
    const file = document.getElementById('image').files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
        previewContainer.classList.remove('hidden');
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        previewContainer.classList.add('hidden');
    }
}
</script>
@endsection