@extends('layouts.admin')

@section('title', 'Edit Article')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Article</h1>
        <p class="text-gray-600">Update news article information</p>
    </div>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.news.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to News
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="p-6 space-y-6">
                <!-- Current Featured Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Current Featured Image
                    </label>
                    <div class="flex items-center space-x-4">
                        @if($news->featured_image)
                            <div class="h-32 w-32 border border-gray-200 rounded-lg overflow-hidden bg-white p-2 flex items-center justify-center">
                                <img src="{{ asset($news->featured_image) }}" 
                                     alt="{{ $news->title }}" 
                                     class="max-h-full max-w-full object-contain">
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">
                                    Current image will be replaced if you upload a new one.
                                </p>
                            </div>
                        @else
                            <div class="h-32 w-32 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 flex items-center justify-center">
                                <span class="text-gray-400">No image</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Article Title *
                    </label>
                    <input type="text" 
                           name="title" 
                           id="title"
                           value="{{ old('title', $news->title) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Enter article title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                        Category *
                    </label>
                    <select name="category" 
                            id="category"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category', $news->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Date -->
                <div>
                    <label for="published_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Published Date *
                    </label>
                    <input type="date" 
                           name="published_date" 
                           id="published_date"
                           value="{{ old('published_date', $news->published_date->format('Y-m-d')) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    @error('published_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                        Short Excerpt
                    </label>
                    <textarea name="excerpt" 
                              id="excerpt"
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                              placeholder="Brief summary of the article">{{ old('excerpt', $news->excerpt) }}</textarea>
                    <p class="mt-2 text-sm text-gray-500">
                        Optional: A short summary that appears in listings (max 200 characters)
                    </p>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Content *
                    </label>
                    <textarea name="content" 
                              id="content"
                              rows="10"
                              required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                              placeholder="Write your article content here...">{{ old('content', $news->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload New Featured Image (Optional)
                    </label>
                    <div class="mt-1 flex items-center space-x-4">
                        <div class="flex-1">
                            <input type="file" 
                                   name="featured_image" 
                                   id="featured_image"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                                   onchange="previewImage(event, 'featured-preview')">
                            <p class="mt-2 text-sm text-gray-500">
                                Leave empty to keep current image. Recommended: 1200x630 pixels, max 2MB.
                            </p>
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="preview-container hidden">
                            <div class="h-32 w-32 border-2 border-dashed border-gray-300 rounded-lg overflow-hidden bg-gray-50 flex items-center justify-center">
                                <img id="featured-preview" class="max-h-full max-w-full object-contain">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Current Gallery -->
                @if($news->gallery && count(json_decode($news->gallery)) > 0)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Current Gallery Images
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        @foreach(json_decode($news->gallery) as $image)
                        <div class="relative border border-gray-200 rounded-lg overflow-hidden">
                            <img src="{{ asset($image) }}" 
                                 alt="Gallery Image {{ $loop->iteration }}"
                                 class="h-32 w-full object-cover">
                        </div>
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-600">
                        Upload new gallery images to replace all current images.
                    </p>
                </div>
                @endif

                <!-- New Gallery Images -->
                <div>
                    <label for="gallery" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload New Gallery Images (Optional)
                    </label>
                    <input type="file" 
                           name="gallery[]" 
                           id="gallery"
                           accept="image/*"
                           multiple
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                    <p class="mt-2 text-sm text-gray-500">
                        New images will replace all current gallery images. Max 2MB each.
                    </p>
                    @error('gallery.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author -->
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700 mb-2">
                        Author (Optional)
                    </label>
                    <input type="text" 
                           name="author" 
                           id="author"
                           value="{{ old('author', $news->author) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Author name">
                    @error('author')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SEO Fields -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                    
                    <div class="space-y-4">
                        <!-- Meta Title -->
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Title
                            </label>
                            <input type="text" 
                                   name="meta_title" 
                                   id="meta_title"
                                   value="{{ old('meta_title', $news->meta_title) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="SEO title for search engines">
                            <p class="mt-2 text-sm text-gray-500">
                                Recommended: 50-60 characters
                            </p>
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Description
                            </label>
                            <textarea name="meta_description" 
                                      id="meta_description"
                                      rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                                      placeholder="SEO description for search engines">{{ old('meta_description', $news->meta_description) }}</textarea>
                            <p class="mt-2 text-sm text-gray-500">
                                Recommended: 150-160 characters
                            </p>
                            @error('meta_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Status Options -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_featured" 
                                   id="is_featured"
                                   value="1"
                                   {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                                Mark as Featured
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 ml-6">
                            Featured articles appear in highlighted sections
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_published" 
                                   id="is_published"
                                   value="1"
                                   {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_published" class="ml-2 block text-sm text-gray-700">
                                Published
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 ml-6">
                            Uncheck to save as draft
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                <form action="{{ route('admin.news.destroy', $news) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this article? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 border border-red-300 text-red-700 rounded-lg hover:bg-red-50 transition flex items-center">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Article
                    </button>
                </form>
                
                <div class="flex space-x-3">
                    <a href="{{ route('admin.news.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Article
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event, previewId) {
    const input = event.target;
    const preview = document.getElementById(previewId);
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