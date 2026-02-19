@extends('layouts.admin')

@section('title', 'Edit Product Lineup')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Edit Product</h1>
        <p class="text-gray-600">Update product details and information</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 bg-gray-50">
            <nav class="flex -mb-px overflow-x-auto">
                <button type="button" onclick="showTab('basic')" class="tab-button active px-6 py-4 text-sm font-medium border-b-2 border-blue-600 text-blue-600 whitespace-nowrap" id="tab-basic-btn">
                    <i class="fas fa-info-circle mr-2"></i>Basic Info
                </button>
                <button type="button" onclick="showTab('details')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-details-btn">
                    <i class="fas fa-tag mr-2"></i>Product Details
                </button>
                <button type="button" onclick="showTab('features')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-features-btn">
                    <i class="fas fa-list mr-2"></i>Features
                </button>
                <button type="button" onclick="showTab('specifications')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-specifications-btn">
                    <i class="fas fa-cogs mr-2"></i>Specifications
                </button>
                <button type="button" onclick="showTab('applications')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-applications-btn">
                    <i class="fas fa-building mr-2"></i>Applications
                </button>
                <button type="button" onclick="showTab('technical')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-technical-btn">
                    <i class="fas fa-chart-line mr-2"></i>Technical
                </button>
                <button type="button" onclick="showTab('gallery')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-gallery-btn">
                    <i class="fas fa-images mr-2"></i>Gallery
                </button>
                <button type="button" onclick="showTab('downloads')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-downloads-btn">
                    <i class="fas fa-download mr-2"></i>Downloads
                </button>
                <button type="button" onclick="showTab('seo')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap" id="tab-seo-btn">
                    <i class="fas fa-search mr-2"></i>SEO
                </button>
            </nav>
        </div>

        <form action="{{ route('admin.product-lineups.update', $productLineup) }}" method="POST" enctype="multipart/form-data" id="productLineupForm">
            @csrf
            @method('PUT')
            
            <div class="p-6">
                <!-- TAB 1: BASIC INFO -->
                <div id="tab-basic" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $productLineup->title) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., VRF System, Single Split"
                                       required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subtitle -->
                            <div>
                                <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Subtitle
                                </label>
                                <input type="text" 
                                       id="subtitle" 
                                       name="subtitle" 
                                       value="{{ old('subtitle', $productLineup->subtitle) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Variable Refrigerant Flow System">
                            </div>

                            <!-- Model Number -->
                            <div>
                                <label for="model_number" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Model Number
                                </label>
                                <input type="text" 
                                       id="model_number" 
                                       name="model_number" 
                                       value="{{ old('model_number', $productLineup->model_number) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., VRF-2024-XL">
                            </div>

                            <!-- Brand -->
                            <div>
                                <label for="brand" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Brand
                                </label>
                                <input type="text" 
                                       id="brand" 
                                       name="brand" 
                                       value="{{ old('brand', $productLineup->brand) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Samsung, LG, Daikin">
                            </div>

                            <!-- Origin -->
                            <div>
                                <label for="origin" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Country of Origin
                                </label>
                                <input type="text" 
                                       id="origin" 
                                       name="origin" 
                                       value="{{ old('origin', $productLineup->origin) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Japan, Korea, Germany">
                            </div>

                            <!-- Warranty -->
                            <div>
                                <label for="warranty" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Warranty
                                </label>
                                <input type="text" 
                                       id="warranty" 
                                       name="warranty" 
                                       value="{{ old('warranty', $productLineup->warranty) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., 2 Years, 5 Years">
                            </div>

                            <!-- Button Text -->
                            <div>
                                <label for="button_text" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Button Text
                                </label>
                                <input type="text" 
                                       id="button_text" 
                                       name="button_text" 
                                       value="{{ old('button_text', $productLineup->button_text) }}"
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
                                       value="{{ old('button_link', $productLineup->button_link) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="https://example.com/product">
                                <p class="mt-1 text-xs text-gray-500">Leave empty to link to product details page</p>
                            </div>

                            <!-- Sort Order -->
                            <div>
                                <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Sort Order
                                </label>
                                <input type="number" 
                                       id="sort_order" 
                                       name="sort_order" 
                                       value="{{ old('sort_order', $productLineup->sort_order) }}"
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
                                @if($productLineup->image)
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset($productLineup->image) }}" 
                                             alt="{{ $productLineup->title }}" 
                                             class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200">
                                        <div>
                                            <p class="text-sm text-gray-600">Current image</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400 text-3xl"></i>
                                    </div>
                                @endif
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
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center space-x-4">
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="is_active" 
                                               value="1" 
                                               {{ old('is_active', $productLineup->is_active) == '1' ? 'checked' : '' }}
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                                               required>
                                        <span class="ml-2 text-gray-700">Active</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="is_active" 
                                               value="0" 
                                               {{ old('is_active', $productLineup->is_active) == '0' ? 'checked' : '' }}
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-gray-700">Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description (Full Width) -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Main product description..."
                                  required>{{ old('description', $productLineup->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- TAB 2: PRODUCT DETAILS (for additional fields if needed) -->
                <div id="tab-details" class="tab-content hidden">
                    <p class="text-gray-500 text-center py-8">Additional product details can be added here</p>
                </div>

                <!-- TAB 3: FEATURES -->
                <div id="tab-features" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Product Features</h3>
                        <button type="button" onclick="addFeature()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Feature
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add key features and benefits of this product</p>
                    
                    <div id="features-container" class="space-y-4">
                        <!-- Features will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 4: SPECIFICATIONS -->
                <div id="tab-specifications" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Technical Specifications</h3>
                        <button type="button" onclick="addSpecification()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Specification
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add technical specifications as key-value pairs</p>
                    
                    <div id="specifications-container" class="space-y-4">
                        <!-- Specifications will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 5: APPLICATIONS -->
                <div id="tab-applications" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Applications</h3>
                        <button type="button" onclick="addApplication()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Application
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Where this product can be used</p>
                    
                    <div id="applications-container" class="space-y-4">
                        <!-- Applications will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 6: TECHNICAL DETAILS -->
                <div id="tab-technical" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Technical Details</h3>
                        <button type="button" onclick="addTechnicalDetail()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Technical Detail
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add detailed technical information</p>
                    
                    <div id="technical-container" class="space-y-4">
                        <!-- Technical details will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 7: GALLERY -->
                <div id="tab-gallery" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Gallery Images</h3>
                        <button type="button" onclick="addGalleryImage()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Image
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Upload additional product images</p>
                    
                    <div id="gallery-container" class="space-y-4">
                        <!-- Gallery images will be loaded dynamically -->
                    </div>
                    
                    <!-- Existing Gallery Images (if any) -->
                    @if($productLineup->gallery_images && count($productLineup->gallery_images) > 0)
                    <div class="mt-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Existing Gallery Images</h4>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($productLineup->gallery_images as $index => $image)
                            <div class="relative group">
                                <img src="{{ asset($image) }}" class="w-full h-24 object-cover rounded-lg">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center rounded-lg">
                                    <button type="button" onclick="removeExistingImage({{ $index }})" class="text-white bg-red-600 p-1 rounded-full">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </div>
                                <input type="hidden" name="existing_gallery_images[]" value="{{ $image }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- TAB 8: DOWNLOADS -->
                <div id="tab-downloads" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Downloads</h3>
                        <button type="button" onclick="addDownload()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Download
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add brochures, datasheets, manuals (PDF)</p>
                    
                    <div id="downloads-container" class="space-y-4">
                        <!-- Downloads will be loaded dynamically -->
                    </div>
                    
                    <!-- Existing Downloads (if any) -->
                    @if($productLineup->downloads && count($productLineup->downloads) > 0)
                    <div class="mt-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Existing Downloads</h4>
                        <div class="space-y-2">
                            @foreach($productLineup->downloads as $index => $download)
                            <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-file-pdf text-red-500 mr-3"></i>
                                    <span>{{ $download['title'] ?? 'Document' }}</span>
                                </div>
                                <button type="button" onclick="removeExistingDownload({{ $index }})" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <input type="hidden" name="existing_downloads[{{ $index }}][title]" value="{{ $download['title'] ?? '' }}">
                                <input type="hidden" name="existing_downloads[{{ $index }}][file]" value="{{ $download['file'] ?? '' }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- TAB 9: SEO -->
                <div id="tab-seo" class="tab-content hidden">
                    <div class="space-y-6">
                        <div>
                            <label for="meta_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Title
                            </label>
                            <input type="text" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title', $productLineup->meta_title) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="SEO Title - leave empty to use product title">
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Description
                            </label>
                            <textarea id="meta_description" 
                                      name="meta_description" 
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                      placeholder="SEO Description">{{ old('meta_description', $productLineup->meta_description) }}</textarea>
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Keywords
                            </label>
                            <input type="text" 
                                   id="meta_keywords" 
                                   name="meta_keywords" 
                                   value="{{ old('meta_keywords', $productLineup->meta_keywords) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="hvac, air conditioner, vrf, comma, separated">
                            <p class="mt-1 text-xs text-gray-500">Comma separated keywords</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                <div>
                    <button type="button" onclick="previousTab()" id="prevBtn" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300 mr-2 hidden">
                        <i class="fas fa-arrow-left mr-2"></i>Previous
                    </button>
                    <button type="button" onclick="nextTab()" id="nextBtn" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300">
                        Next<i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
                <div>
                    <a href="{{ route('admin.product-lineups.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300 mr-2">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300">
                        <i class="fas fa-save mr-2"></i>Update Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let currentTab = 'basic';
let featureCount = {{ $productLineup->features ? count($productLineup->features) : 0 }};
let specificationCount = {{ $productLineup->specifications ? count($productLineup->specifications) : 0 }};
let applicationCount = {{ $productLineup->applications ? count($productLineup->applications) : 0 }};
let technicalCount = {{ $productLineup->technical_details ? count($productLineup->technical_details) : 0 }};
let galleryCount = {{ $productLineup->gallery_images ? count($productLineup->gallery_images) : 0 }};
let downloadCount = {{ $productLineup->downloads ? count($productLineup->downloads) : 0 }};

// Load existing data
const existingFeatures = @json($productLineup->features ?? []);
const existingSpecifications = @json($productLineup->specifications ?? []);
const existingApplications = @json($productLineup->applications ?? []);
const existingTechnical = @json($productLineup->technical_details ?? []);
const existingGallery = @json($productLineup->gallery_images ?? []);
const existingDownloads = @json($productLineup->downloads ?? []);

function showTab(tabId) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Show selected tab
    document.getElementById(`tab-${tabId}`).classList.remove('hidden');
    
    // Update button styles
    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active', 'border-blue-600', 'text-blue-600');
        btn.classList.add('border-transparent', 'text-gray-500');
    });
    
    document.getElementById(`tab-${tabId}-btn`).classList.add('active', 'border-blue-600', 'text-blue-600');
    document.getElementById(`tab-${tabId}-btn`).classList.remove('border-transparent', 'text-gray-500');
    
    currentTab = tabId;
    updateNavButtons();
}

function updateNavButtons() {
    const tabs = ['basic', 'details', 'features', 'specifications', 'applications', 'technical', 'gallery', 'downloads', 'seo'];
    const currentIndex = tabs.indexOf(currentTab);
    
    if (currentIndex > 0) {
        document.getElementById('prevBtn').classList.remove('hidden');
    } else {
        document.getElementById('prevBtn').classList.add('hidden');
    }
    
    if (currentIndex < tabs.length - 1) {
        document.getElementById('nextBtn').classList.remove('hidden');
    } else {
        document.getElementById('nextBtn').classList.add('hidden');
    }
}

function nextTab() {
    const tabs = ['basic', 'details', 'features', 'specifications', 'applications', 'technical', 'gallery', 'downloads', 'seo'];
    const currentIndex = tabs.indexOf(currentTab);
    if (currentIndex < tabs.length - 1) {
        showTab(tabs[currentIndex + 1]);
    }
}

function previousTab() {
    const tabs = ['basic', 'details', 'features', 'specifications', 'applications', 'technical', 'gallery', 'downloads', 'seo'];
    const currentIndex = tabs.indexOf(currentTab);
    if (currentIndex > 0) {
        showTab(tabs[currentIndex - 1]);
    }
}

// Feature functions
function addFeature(value = '') {
    const container = document.getElementById('features-container');
    const index = featureCount++;
    
    const html = `
        <div class="feature-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    <input type="text" 
                           name="features[]" 
                           value="${value}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="e.g., Energy efficient with inverter technology">
                </div>
                <button type="button" onclick="removeFeature(this)" class="ml-3 text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeFeature(button) {
    button.closest('.feature-item').remove();
}

// Specification functions
function addSpecification(key = '', value = '') {
    const container = document.getElementById('specifications-container');
    const index = specificationCount++;
    
    const html = `
        <div class="specification-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-start gap-4">
                <div class="flex-1">
                    <input type="text" 
                           name="specifications[${index}][key]" 
                           value="${key}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm mb-2"
                           placeholder="Specification name (e.g., Capacity)">
                </div>
                <div class="flex-1">
                    <input type="text" 
                           name="specifications[${index}][value]" 
                           value="${value}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Value (e.g., 5 Tons)">
                </div>
                <button type="button" onclick="removeSpecification(this)" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeSpecification(button) {
    button.closest('.specification-item').remove();
}

// Application functions
function addApplication(value = '') {
    const container = document.getElementById('applications-container');
    const index = applicationCount++;
    
    const html = `
        <div class="application-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    <input type="text" 
                           name="applications[]" 
                           value="${value}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="e.g., Commercial buildings, Hospitals">
                </div>
                <button type="button" onclick="removeApplication(this)" class="ml-3 text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeApplication(button) {
    button.closest('.application-item').remove();
}

// Technical detail functions
function addTechnicalDetail(value = '') {
    const container = document.getElementById('technical-container');
    const index = technicalCount++;
    
    const html = `
        <div class="technical-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    <textarea 
                           name="technical_details[]" 
                           rows="2"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Technical detail...">${value}</textarea>
                </div>
                <button type="button" onclick="removeTechnical(this)" class="ml-3 text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeTechnical(button) {
    button.closest('.technical-item').remove();
}

// Gallery image functions
function addGalleryImage() {
    const container = document.getElementById('gallery-container');
    const index = galleryCount++;
    
    const html = `
        <div class="gallery-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    <input type="file" 
                           name="gallery_images[]" 
                           accept="image/*"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <button type="button" onclick="removeGalleryImage(this)" class="ml-3 text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeGalleryImage(button) {
    button.closest('.gallery-item').remove();
}

// Download functions
function addDownload(title = '', file = '') {
    const container = document.getElementById('downloads-container');
    const index = downloadCount++;
    
    const html = `
        <div class="download-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <input type="text" 
                           name="downloads[${index}][title]" 
                           value="${title}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Title (e.g., Brochure)">
                </div>
                <div class="flex items-center gap-2">
                    <input type="file" 
                           name="downloads[${index}][file]" 
                           accept=".pdf,.doc,.docx"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <button type="button" onclick="removeDownload(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeDownload(button) {
    button.closest('.download-item').remove();
}

function removeExistingImage(index) {
    if (confirm('Remove this image?')) {
        // Add logic to handle existing image removal
        event.target.closest('.relative').remove();
    }
}

function removeExistingDownload(index) {
    if (confirm('Remove this download?')) {
        event.target.closest('.flex.items-center').remove();
    }
}

// Image preview
function previewFile() {
    const fileInput = document.getElementById('image');
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('imagePreview');
    const file = fileInput.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

// Initialize with existing data
document.addEventListener('DOMContentLoaded', function() {
    // Load features
    if (existingFeatures && existingFeatures.length > 0) {
        existingFeatures.forEach(feature => addFeature(feature));
    }
    
    // Load specifications
    if (existingSpecifications && existingSpecifications.length > 0) {
        existingSpecifications.forEach(spec => {
            if (typeof spec === 'object') {
                addSpecification(spec.key || '', spec.value || '');
            }
        });
    }
    
    // Load applications
    if (existingApplications && existingApplications.length > 0) {
        existingApplications.forEach(app => addApplication(app));
    }
    
    // Load technical details
    if (existingTechnical && existingTechnical.length > 0) {
        existingTechnical.forEach(detail => addTechnicalDetail(detail));
    }
});
</script>
@endsection