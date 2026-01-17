@extends('layouts.admin')

@section('title', 'Edit Banner Slide')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Banner Slide</h1>
        <p class="text-gray-600">Update banner slide details</p>
    </div>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.banner-slides.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Slides
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.banner-slides.update', $bannerSlide) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="p-6 space-y-6">
                <!-- Current Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Current Image
                    </label>
                    <div class="flex items-center space-x-4">
                        @if($bannerSlide->image_url)
                            <div class="h-32 w-48 border border-gray-200 rounded-lg overflow-hidden bg-white p-2 flex items-center justify-center">
                                <img src="{{ $bannerSlide->image_url }}" 
                                     alt="{{ $bannerSlide->title }}" 
                                     class="max-h-full max-w-full object-contain">
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">
                                    Current image will be replaced if you upload a new one.
                                </p>
                            </div>
                        @else
                            <div class="h-32 w-48 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 flex items-center justify-center">
                                <span class="text-gray-400">No image</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title *
                    </label>
                    <input type="text" 
                           name="title" 
                           id="title"
                           value="{{ old('title', $bannerSlide->title) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Enter slide title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle -->
                <div>
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                        Subtitle (Optional)
                    </label>
                    <input type="text" 
                           name="subtitle" 
                           id="subtitle"
                           value="{{ old('subtitle', $bannerSlide->subtitle) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Enter slide subtitle">
                    @error('subtitle')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description (Optional)
                    </label>
                    <textarea name="description" 
                              id="description"
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                              placeholder="Enter slide description">{{ old('description', $bannerSlide->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button Text -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">
                            Button Text (Optional)
                        </label>
                        <input type="text" 
                               name="button_text" 
                               id="button_text"
                               value="{{ old('button_text', $bannerSlide->button_text) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="e.g., Learn More">
                        @error('button_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="button_link" class="block text-sm font-medium text-gray-700 mb-2">
                            Button Link (Optional)
                        </label>
                        <input type="text" 
                               name="button_link" 
                               id="button_link"
                               value="{{ old('button_link', $bannerSlide->button_link) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="e.g., /products">
                        @error('button_link')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- New Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload New Image (Optional)
                    </label>
                    <div class="mt-1 flex items-center space-x-4">
                        <div class="flex-1">
                            <input type="file" 
                                   name="image" 
                                   id="image"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                                   onchange="previewImage(event)">
                            <p class="mt-2 text-sm text-gray-500">
                                Leave empty to keep current image. Recommended: 1920x600 pixels.
                            </p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="preview-container hidden">
                            <div class="h-32 w-48 border-2 border-dashed border-gray-300 rounded-lg overflow-hidden bg-gray-50 flex items-center justify-center">
                                <img id="image-preview" class="max-h-full max-w-full object-contain">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                        Sort Order
                    </label>
                    <input type="number" 
                           name="sort_order" 
                           id="sort_order"
                           value="{{ old('sort_order', $bannerSlide->sort_order) }}"
                           class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="0">
                    <p class="mt-2 text-sm text-gray-500">
                        Lower numbers appear first.
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
                               {{ old('is_active', $bannerSlide->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Active (Show on homepage)
                        </label>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        If unchecked, this slide will be hidden from the homepage.
                    </p>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                <form action="{{ route('admin.banner-slides.destroy', $bannerSlide) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this slide? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 border border-red-300 text-red-700 rounded-lg hover:bg-red-50 transition flex items-center">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Slide
                    </button>
                </form>
                
                <div class="flex space-x-3">
                    <a href="{{ route('admin.banner-slides.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Slide
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image-preview');
    const container = document.querySelector('.preview-container');
    
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
</script>
@endsection