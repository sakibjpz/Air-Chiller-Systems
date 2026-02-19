@extends('layouts.admin')

@section('title', 'Add Solution')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Add New Solution</h1>
        <p class="text-gray-600">Create a comprehensive solution with all details</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 bg-gray-50">
            <nav class="flex -mb-px">
                <button type="button" onclick="showTab('basic')" class="tab-button active px-6 py-4 text-sm font-medium border-b-2 border-blue-600 text-blue-600" id="tab-basic-btn">
                    <i class="fas fa-info-circle mr-2"></i>Basic Info
                </button>
                <button type="button" onclick="showTab('features')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-features-btn">
                    <i class="fas fa-cubes mr-2"></i>Features
                </button>
                <button type="button" onclick="showTab('equipment')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-equipment-btn">
                    <i class="fas fa-tools mr-2"></i>Equipment
                </button>
                <button type="button" onclick="showTab('statistics')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-statistics-btn">
                    <i class="fas fa-chart-bar mr-2"></i>Statistics
                </button>
                <button type="button" onclick="showTab('seo')" class="tab-button px-6 py-4 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-seo-btn">
                    <i class="fas fa-search mr-2"></i>SEO
                </button>
            </nav>
        </div>

        <form action="{{ route('admin.solutions.store') }}" method="POST" enctype="multipart/form-data" id="solutionForm">
            @csrf
            
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
                                       value="{{ old('title') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Hospital HVAC Solutions"
                                       required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Why Heading -->
                            <div>
                                <label for="why_heading" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Why Section Heading
                                </label>
                                <input type="text" 
                                       id="why_heading" 
                                       name="why_heading" 
                                       value="{{ old('why_heading', 'Why Need Specialized HVAC Systems') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="Why Need Specialized HVAC Systems">
                            </div>

                            <!-- Why Description -->
                            <div>
                                <label for="why_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Why Section Description
                                </label>
                                <textarea id="why_description" 
                                          name="why_description" 
                                          rows="2"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                          placeholder="Brief description for why section">{{ old('why_description') }}</textarea>
                            </div>

                            <!-- Equipment Heading -->
                            <div>
                                <label for="equipment_heading" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Equipment Section Heading
                                </label>
                                <input type="text" 
                                       id="equipment_heading" 
                                       name="equipment_heading" 
                                       value="{{ old('equipment_heading', 'Equipment We Provide') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="Equipment We Provide">
                            </div>

                            <!-- Expertise Heading -->
                            <div>
                                <label for="expertise_heading" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Expertise Section Heading
                                </label>
                                <input type="text" 
                                       id="expertise_heading" 
                                       name="expertise_heading" 
                                       value="{{ old('expertise_heading', 'Our Expertise') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="Our Expertise">
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
                                       placeholder="https://example.com/page">
                                <p class="mt-1 text-xs text-gray-500">Leave empty to link to solution page</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Image Upload -->
                            <div>
                                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Main Image <span class="text-red-500">*</span>
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-300">
                                    <div id="imagePreview" class="mb-4 hidden">
                                        <img id="previewImage" class="mx-auto h-32 w-32 object-cover rounded-lg">
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

                            <!-- Icon -->
                            <div>
                                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Font Awesome Icon
                                </label>
                                <input type="text" 
                                       id="icon" 
                                       name="icon" 
                                       value="{{ old('icon') }}"
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
                                       value="{{ old('sort_order', 0) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       min="0">
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

                    <!-- Description (Full Width) -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Main description for the solution..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- TAB 2: FEATURES -->
                <div id="tab-features" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Feature Boxes</h3>
                        <button type="button" onclick="addFeature()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Feature
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">These appear as feature boxes in the "Why" section</p>
                    
                    <div id="features-container" class="space-y-4">
                        <!-- Features will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 3: EQUIPMENT -->
                <div id="tab-equipment" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Equipment List</h3>
                        <button type="button" onclick="addEquipment()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Equipment
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Equipment items with descriptions</p>
                    
                    <div id="equipment-container" class="space-y-4">
                        <!-- Equipment will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 4: STATISTICS -->
                <div id="tab-statistics" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Statistics / Expertise Numbers</h3>
                        <button type="button" onclick="addStatistic()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Statistic
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Numbers that showcase your expertise (e.g., 50+ Facilities Served)</p>
                    
                    <div id="statistics-container" class="space-y-4">
                        <!-- Statistics will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 5: SEO -->
                <div id="tab-seo" class="tab-content hidden">
                    <div class="space-y-6">
                        <div>
                            <label for="meta_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Title
                            </label>
                            <input type="text" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="SEO Title - leave empty to use solution title">
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Description
                            </label>
                            <textarea id="meta_description" 
                                      name="meta_description" 
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                      placeholder="SEO Description">{{ old('meta_description') }}</textarea>
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Keywords
                            </label>
                            <input type="text" 
                                   id="meta_keywords" 
                                   name="meta_keywords" 
                                   value="{{ old('meta_keywords') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="hvac, hospital, cooling, comma, separated">
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
                    <a href="{{ route('admin.solutions.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300 mr-2">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300">
                        <i class="fas fa-save mr-2"></i>Save Solution
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let currentTab = 'basic';
let featureCount = 0;
let equipmentCount = 0;
let statisticCount = 0;

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
    const tabs = ['basic', 'features', 'equipment', 'statistics', 'seo'];
    const currentIndex = tabs.indexOf(currentTab);
    
    // Previous button
    if (currentIndex > 0) {
        document.getElementById('prevBtn').classList.remove('hidden');
    } else {
        document.getElementById('prevBtn').classList.add('hidden');
    }
    
    // Next button
    if (currentIndex < tabs.length - 1) {
        document.getElementById('nextBtn').classList.remove('hidden');
    } else {
        document.getElementById('nextBtn').classList.add('hidden');
    }
}

function nextTab() {
    const tabs = ['basic', 'features', 'equipment', 'statistics', 'seo'];
    const currentIndex = tabs.indexOf(currentTab);
    if (currentIndex < tabs.length - 1) {
        showTab(tabs[currentIndex + 1]);
    }
}

function previousTab() {
    const tabs = ['basic', 'features', 'equipment', 'statistics', 'seo'];
    const currentIndex = tabs.indexOf(currentTab);
    if (currentIndex > 0) {
        showTab(tabs[currentIndex - 1]);
    }
}

// Feature functions
function addFeature(featureData = null) {
    const container = document.getElementById('features-container');
    const index = featureCount++;
    
    const icon = featureData?.icon || 'fas fa-shield-alt';
    const title = featureData?.title || '';
    const description = featureData?.description || '';
    
    const html = `
        <div class="feature-item bg-gray-50 p-4 rounded-lg border border-gray-200" data-index="${index}">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-semibold text-gray-700">Feature #${index + 1}</h4>
                <button type="button" onclick="removeFeature(this)" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Icon</label>
                    <input type="text" 
                           name="features[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="fas fa-icon">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Title</label>
                    <input type="text" 
                           name="features[${index}][title]" 
                           value="${title}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Feature title">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Description</label>
                    <input type="text" 
                           name="features[${index}][description]" 
                           value="${description}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Feature description">
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeFeature(button) {
    button.closest('.feature-item').remove();
}

// Equipment functions
function addEquipment(equipmentData = null) {
    const container = document.getElementById('equipment-container');
    const index = equipmentCount++;
    
    const value = equipmentData || '';
    
    const html = `
        <div class="equipment-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    <input type="text" 
                           name="equipment[]" 
                           value="${value}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Equipment item with description">
                </div>
                <button type="button" onclick="removeEquipment(this)" class="ml-3 text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeEquipment(button) {
    button.closest('.equipment-item').remove();
}

// Statistics functions
function addStatistic(statData = null) {
    const container = document.getElementById('statistics-container');
    const index = statisticCount++;
    
    const value = statData?.value || '';
    const label = statData?.label || '';
    
    const html = `
        <div class="statistic-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-semibold text-gray-700">Statistic #${index + 1}</h4>
                <button type="button" onclick="removeStatistic(this)" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Value</label>
                    <input type="text" 
                           name="statistics[${index}][value]" 
                           value="${value}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="50+">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Label</label>
                    <input type="text" 
                           name="statistics[${index}][label]" 
                           value="${label}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Facilities Served">
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeStatistic(button) {
    button.closest('.statistic-item').remove();
}

// Image preview
function previewFile() {
    const fileInput = document.getElementById('image');
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const file = fileInput.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
            previewContainer.classList.remove('hidden');
            uploadArea.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
}

// Add default items
document.addEventListener('DOMContentLoaded', function() {
    // Add 3 default features
    addFeature({icon: 'fas fa-shield-alt', title: 'Infection Control', description: 'Precise air filtration and pressure control to prevent cross-contamination'});
    addFeature({icon: 'fas fa-temperature-low', title: 'Temperature Control', description: 'Critical areas require specific temperature ranges'});
    addFeature({icon: 'fas fa-wind', title: 'Air Quality', description: 'HEPA filters and UVGI systems for sterile environments'});
    
    // Add 4 default equipment
    addEquipment('Medical Grade Chillers: For MRI machines, lab equipment cooling');
    addEquipment('Operating Theater AHUs: With HEPA filtration and pressure control');
    addEquipment('Isolation Room Systems: Negative/positive pressure systems');
    addEquipment('Central Cooling Plants: For entire complexes');
    
    // Add 2 default statistics
    addStatistic({value: '50+', label: 'Facilities Served'});
    addStatistic({value: '24/7', label: 'Support Service'});
});
</script>
@endsection