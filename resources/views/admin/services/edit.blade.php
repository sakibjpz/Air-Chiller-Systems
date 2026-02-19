@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Edit Service</h1>
        <p class="text-gray-600">Update service details and content</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 bg-gray-50 overflow-x-auto">
            <nav class="flex whitespace-nowrap">
                <button type="button" onclick="showTab('basic')" class="tab-button active px-4 py-3 text-sm font-medium border-b-2 border-blue-600 text-blue-600" id="tab-basic-btn">
                    <i class="fas fa-info-circle mr-2"></i>Basic Info
                </button>
                <button type="button" onclick="showTab('hero')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-hero-btn">
                    <i class="fas fa-image mr-2"></i>Hero Section
                </button>
                <button type="button" onclick="showTab('statistics')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-statistics-btn">
                    <i class="fas fa-chart-bar mr-2"></i>Statistics
                </button>
                <button type="button" onclick="showTab('overview')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-overview-btn">
                    <i class="fas fa-th-large mr-2"></i>Overview Cards
                </button>
                <button type="button" onclick="showTab('support')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-support-btn">
                    <i class="fas fa-headset mr-2"></i>Support Section
                </button>
                <button type="button" onclick="showTab('building')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-building-btn">
                    <i class="fas fa-building mr-2"></i>Building Systems
                </button>
                <button type="button" onclick="showTab('chillers')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-chillers-btn">
                    <i class="fas fa-snowflake mr-2"></i>Chillers
                </button>
                <button type="button" onclick="showTab('central')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-central-btn">
                    <i class="fas fa-industry mr-2"></i>Central Plant
                </button>
                <button type="button" onclick="showTab('cta')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-cta-btn">
                    <i class="fas fa-phone-alt mr-2"></i>CTA Section
                </button>
                <button type="button" onclick="showTab('seo')" class="tab-button px-4 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-seo-btn">
                    <i class="fas fa-search mr-2"></i>SEO
                </button>
            </nav>
        </div>

        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" id="serviceForm">
            @csrf
            @method('PUT')
            
            <div class="p-6">
                <!-- TAB 1: BASIC INFO -->
                <div id="tab-basic" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $service->title) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Engineering Services"
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
                                       value="{{ old('subtitle', $service->subtitle) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Complete Engineering Solutions">
                            </div>

                            <!-- Icon -->
                            <div>
                                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Font Awesome Icon
                                </label>
                                <input type="text" 
                                       id="icon" 
                                       name="icon" 
                                       value="{{ old('icon', $service->icon ?? 'fas fa-cogs') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="fas fa-cogs">
                                <p class="mt-1 text-xs text-gray-500">Icon for service listing</p>
                            </div>

                            <!-- Sort Order -->
                            <div>
                                <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Sort Order
                                </label>
                                <input type="number" 
                                       id="sort_order" 
                                       name="sort_order" 
                                       value="{{ old('sort_order', $service->sort_order) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       min="0">
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Current Main Image -->
                            @if($service->image)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Current Image
                                </label>
                                <img src="{{ asset($service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200">
                            </div>
                            @endif

                            <!-- New Main Image -->
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
                                           onchange="previewFile(this, 'previewImage', 'imagePreview')">
                                    <button type="button" 
                                            onclick="document.getElementById('image').click()"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm">
                                        <i class="fas fa-upload mr-2"></i>Upload New Image
                                    </button>
                                </div>
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
                                               {{ old('is_active', $service->is_active) == '1' ? 'checked' : '' }}
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                                               required>
                                        <span class="ml-2 text-gray-700">Active</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="is_active" 
                                               value="0" 
                                               {{ old('is_active', $service->is_active) == '0' ? 'checked' : '' }}
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-gray-700">Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Main service description..."
                                  required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- TAB 2: HERO SECTION -->
                <div id="tab-hero" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div>
                                <label for="hero_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Hero Title
                                </label>
                                <input type="text" 
                                       id="hero_title" 
                                       name="hero_title" 
                                       value="{{ old('hero_title', $service->hero_title) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Comprehensive Engineering Services">
                            </div>

                            <div>
                                <label for="hero_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Hero Description
                                </label>
                                <textarea id="hero_description" 
                                          name="hero_description" 
                                          rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                          placeholder="Hero section description...">{{ old('hero_description', $service->hero_description) }}</textarea>
                            </div>
                        </div>

                        <div>
                            @if($service->hero_image)
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Current Hero Image
                                </label>
                                <img src="{{ asset($service->hero_image) }}" 
                                     alt="Hero Image" 
                                     class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200">
                            </div>
                            @endif

                            <label for="hero_image" class="block text-sm font-semibold text-gray-700 mb-2">
                                New Hero Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition duration-300">
                                <div id="heroImagePreview" class="mb-3 hidden">
                                    <img id="previewHeroImage" class="mx-auto h-24 w-24 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="hero_image" 
                                       name="hero_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewHeroImage', 'heroImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('hero_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm">
                                    <i class="fas fa-upload mr-2"></i>Upload New Image
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: STATISTICS -->
                <div id="tab-statistics" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Statistics</h3>
                        <button type="button" onclick="addStatistic()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Statistic
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add statistics like "24/7 Support", "100% Quality", etc.</p>
                    
                    <div id="statistics-container" class="space-y-4">
                        <!-- Statistics will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 4: OVERVIEW CARDS -->
                <div id="tab-overview" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Overview Cards</h3>
                        <button type="button" onclick="addOverviewCard()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Card
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add service overview cards (Complete Support, Building Systems, etc.)</p>
                    
                    <div id="overview-cards-container" class="space-y-4">
                        <!-- Overview cards will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 5: SUPPORT SECTION -->
                <div id="tab-support" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="support_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Support Section Title
                            </label>
                            <input type="text" 
                                   id="support_title" 
                                   name="support_title" 
                                   value="{{ old('support_title', $service->support_title ?? 'Complete Support & Solutions') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                        
                        <div>
                            @if($service->support_image)
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Current Support Image
                                </label>
                                <img src="{{ asset($service->support_image) }}" 
                                     alt="Support Image" 
                                     class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200">
                            </div>
                            @endif

                            <label for="support_image" class="block text-sm font-semibold text-gray-700 mb-2">
                                New Support Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition duration-300">
                                <div id="supportImagePreview" class="mb-3 hidden">
                                    <img id="previewSupportImage" class="mx-auto h-24 w-24 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="support_image" 
                                       name="support_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewSupportImage', 'supportImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('support_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm">
                                    <i class="fas fa-upload mr-2"></i>Upload New Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="support_description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Support Section Description
                        </label>
                        <textarea id="support_description" 
                                  name="support_description" 
                                  rows="2"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Description for support section...">{{ old('support_description', $service->support_description) }}</textarea>
                    </div>

                    <div class="mb-4 flex justify-between items-center">
                        <h4 class="text-md font-semibold text-gray-700">Support Features</h4>
                        <button type="button" onclick="addSupportFeature()" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs">
                            <i class="fas fa-plus mr-1"></i>Add Feature
                        </button>
                    </div>
                    
                    <div id="support-features-container" class="space-y-4">
                        <!-- Support features will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 6: BUILDING SYSTEMS -->
                <div id="tab-building" class="tab-content hidden">
                    <div class="mb-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Building Systems</h3>
                        <button type="button" onclick="addBuildingSystem()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                            <i class="fas fa-plus mr-2"></i>Add System
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Add building system upgrades (HVAC, Electrical, Automation)</p>
                    
                    <div id="building-systems-container" class="space-y-4">
                        <!-- Building systems will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 7: CHILLERS -->
                <div id="tab-chillers" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="chillers_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Chillers Section Title
                            </label>
                            <input type="text" 
                                   id="chillers_title" 
                                   name="chillers_title" 
                                   value="{{ old('chillers_title', $service->chillers_title ?? 'Chillers & Cooling Solutions') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                        
                        <div>
                            <label for="chillers_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Chillers Section Description
                            </label>
                            <input type="text" 
                                   id="chillers_description" 
                                   name="chillers_description" 
                                   value="{{ old('chillers_description', $service->chillers_description) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="Description for chillers section">
                        </div>
                    </div>

                    <div class="mb-4 flex justify-between items-center">
                        <h4 class="text-md font-semibold text-gray-700">Chiller Types</h4>
                        <button type="button" onclick="addChiller()" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs">
                            <i class="fas fa-plus mr-1"></i>Add Chiller
                        </button>
                    </div>
                    
                    <div id="chillers-container" class="space-y-4">
                        <!-- Chillers will be loaded dynamically -->
                    </div>
                </div>

                <!-- TAB 8: CENTRAL PLANT -->
                <div id="tab-central" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="central_plant_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Central Plant Title
                            </label>
                            <input type="text" 
                                   id="central_plant_title" 
                                   name="central_plant_title" 
                                   value="{{ old('central_plant_title', $service->central_plant_title ?? 'Central Plant & District Cooling') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                        
                        <div>
                            <label for="central_plant_stats" class="block text-sm font-semibold text-gray-700 mb-2">
                                Stats Badge (e.g., 40% Energy Savings)
                            </label>
                            <input type="text" 
                                   id="central_plant_stats" 
                                   name="central_plant_stats" 
                                   value="{{ old('central_plant_stats', $service->central_plant_stats ?? '40% Energy Savings') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="central_plant_description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Central Plant Description
                        </label>
                        <textarea id="central_plant_description" 
                                  name="central_plant_description" 
                                  rows="2"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Description for central plant section...">{{ old('central_plant_description', $service->central_plant_description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            @if($service->central_plant_image)
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Current Central Plant Image
                                </label>
                                <img src="{{ asset($service->central_plant_image) }}" 
                                     alt="Central Plant Image" 
                                     class="w-32 h-32 object-cover rounded-lg border-2 border-blue-200">
                            </div>
                            @endif

                            <label for="central_plant_image" class="block text-sm font-semibold text-gray-700 mb-2">
                                New Central Plant Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition duration-300">
                                <div id="plantImagePreview" class="mb-3 hidden">
                                    <img id="previewPlantImage" class="mx-auto h-24 w-24 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="central_plant_image" 
                                       name="central_plant_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewPlantImage', 'plantImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('central_plant_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm">
                                    <i class="fas fa-upload mr-2"></i>Upload New Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-md font-semibold text-gray-700 mb-3">Central Plant Features</h4>
                        <div id="central-features-container" class="space-y-3">
                            <!-- Central plant features will be loaded dynamically -->
                        </div>
                        <button type="button" onclick="addCentralFeature()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm">
                            <i class="fas fa-plus mr-1"></i>Add Feature
                        </button>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-md font-semibold text-gray-700 mb-3">Central Plant Services</h4>
                        <div id="central-services-container" class="space-y-3">
                            <!-- Central plant services will be loaded dynamically -->
                        </div>
                        <button type="button" onclick="addCentralService()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm">
                            <i class="fas fa-plus mr-1"></i>Add Service
                        </button>
                    </div>
                </div>

                <!-- TAB 9: CTA SECTION -->
                <div id="tab-cta" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div>
                                <label for="cta_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    CTA Title
                                </label>
                                <input type="text" 
                                       id="cta_title" 
                                       name="cta_title" 
                                       value="{{ old('cta_title', $service->cta_title ?? 'Need Engineering Solutions?') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            </div>

                            <div>
                                <label for="cta_button_text" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Button Text
                                </label>
                                <input type="text" 
                                       id="cta_button_text" 
                                       name="cta_button_text" 
                                       value="{{ old('cta_button_text', $service->cta_button_text ?? 'Get a Quote') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            </div>

                            <div>
                                <label for="cta_button_link" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Button Link
                                </label>
                                <input type="text" 
                                       id="cta_button_link" 
                                       name="cta_button_link" 
                                       value="{{ old('cta_button_link', $service->cta_button_link) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="/contact">
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label for="cta_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                    CTA Description
                                </label>
                                <textarea id="cta_description" 
                                          name="cta_description" 
                                          rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                          placeholder="Description for CTA section...">{{ old('cta_description', $service->cta_description) }}</textarea>
                            </div>

                            <div>
                                <label for="cta_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input type="text" 
                                       id="cta_phone" 
                                       name="cta_phone" 
                                       value="{{ old('cta_phone', $service->cta_phone ?? '+880(121) 456 77') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="Contact phone number">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 10: SEO -->
                <div id="tab-seo" class="tab-content hidden">
                    <div class="space-y-6">
                        <div>
                            <label for="meta_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Title
                            </label>
                            <input type="text" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title', $service->meta_title) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="SEO Title - leave empty to use service title">
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Description
                            </label>
                            <textarea id="meta_description" 
                                      name="meta_description" 
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                      placeholder="SEO Description">{{ old('meta_description', $service->meta_description) }}</textarea>
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-semibold text-gray-700 mb-2">
                                Meta Keywords
                            </label>
                            <input type="text" 
                                   id="meta_keywords" 
                                   name="meta_keywords" 
                                   value="{{ old('meta_keywords', $service->meta_keywords) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="engineering, services, hvac, comma, separated">
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
                    <a href="{{ route('admin.services.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300 mr-2">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300">
                        <i class="fas fa-save mr-2"></i>Update Service
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let currentTab = 'basic';
let statisticCount = {{ $service->statistics ? count($service->statistics) : 0 }};
let overviewCardCount = {{ $service->overview_cards ? count($service->overview_cards) : 0 }};
let supportFeatureCount = {{ $service->support_features ? count($service->support_features) : 0 }};
let buildingSystemCount = {{ $service->building_systems ? count($service->building_systems) : 0 }};
let chillerCount = {{ $service->chillers ? count($service->chillers) : 0 }};
let centralFeatureCount = {{ $service->central_plant_features ? count($service->central_plant_features) : 0 }};
let centralServiceCount = {{ $service->central_plant_services ? count($service->central_plant_services) : 0 }};

// Load existing data
const existingStatistics = @json($service->statistics ?? []);
const existingOverviewCards = @json($service->overview_cards ?? []);
const existingSupportFeatures = @json($service->support_features ?? []);
const existingBuildingSystems = @json($service->building_systems ?? []);
const existingChillers = @json($service->chillers ?? []);
const existingCentralFeatures = @json($service->central_plant_features ?? []);
const existingCentralServices = @json($service->central_plant_services ?? []);

const tabs = ['basic', 'hero', 'statistics', 'overview', 'support', 'building', 'chillers', 'central', 'cta', 'seo'];

function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    document.getElementById(`tab-${tabId}`).classList.remove('hidden');
    
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
    const currentIndex = tabs.indexOf(currentTab);
    
    document.getElementById('prevBtn').classList.toggle('hidden', currentIndex === 0);
    document.getElementById('nextBtn').classList.toggle('hidden', currentIndex === tabs.length - 1);
}

function nextTab() {
    const currentIndex = tabs.indexOf(currentTab);
    if (currentIndex < tabs.length - 1) {
        showTab(tabs[currentIndex + 1]);
    }
}

function previousTab() {
    const currentIndex = tabs.indexOf(currentTab);
    if (currentIndex > 0) {
        showTab(tabs[currentIndex - 1]);
    }
}

function previewFile(input, previewId, containerId) {
    const preview = document.getElementById(previewId);
    const container = document.getElementById(containerId);
    const file = input.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
            container.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

// Statistics functions
function addStatistic(value = '', label = '') {
    const container = document.getElementById('statistics-container');
    const index = statisticCount++;
    
    const html = `
        <div class="statistic-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <input type="text" 
                           name="statistics[${index}][value]" 
                           value="${value}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Value (e.g., 24/7)">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="statistics[${index}][label]" 
                           value="${label}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Label (e.g., Support)">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Overview Cards
function addOverviewCard(icon = '', title = '', description = '') {
    const container = document.getElementById('overview-cards-container');
    const index = overviewCardCount++;
    
    const html = `
        <div class="overview-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <input type="text" 
                           name="overview_cards[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Icon class">
                </div>
                <div>
                    <input type="text" 
                           name="overview_cards[${index}][title]" 
                           value="${title}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="overview_cards[${index}][description]" 
                           value="${description}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Support Features
function addSupportFeature(icon = '', title = '', description = '') {
    const container = document.getElementById('support-features-container');
    const index = supportFeatureCount++;
    
    const html = `
        <div class="support-feature-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <input type="text" 
                           name="support_features[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Icon class">
                </div>
                <div>
                    <input type="text" 
                           name="support_features[${index}][title]" 
                           value="${title}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="support_features[${index}][description]" 
                           value="${description}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Building Systems
function addBuildingSystem(icon = '', title = '', description = '', features = []) {
    const container = document.getElementById('building-systems-container');
    const index = buildingSystemCount++;
    
    const featuresStr = Array.isArray(features) ? features.join(', ') : features;
    
    const html = `
        <div class="building-system-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-3 gap-4 mb-3">
                <div>
                    <input type="text" 
                           name="building_systems[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Icon class">
                </div>
                <div>
                    <input type="text" 
                           name="building_systems[${index}][title]" 
                           value="${title}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="building_systems[${index}][description]" 
                           value="${description}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="text-xs text-gray-500 mb-1 block">Features (comma separated)</label>
                <input type="text" 
                       name="building_systems[${index}][features]" 
                       value="${featuresStr}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                       placeholder="Feature 1, Feature 2, Feature 3">
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Chillers
function addChiller(title = '', description = '', tags = []) {
    const container = document.getElementById('chillers-container');
    const index = chillerCount++;
    
    const tagsStr = Array.isArray(tags) ? tags.join(', ') : tags;
    
    const html = `
        <div class="chiller-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-2 gap-4 mb-3">
                <div>
                    <input type="text" 
                           name="chillers[${index}][title]" 
                           value="${title}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="chillers[${index}][description]" 
                           value="${description}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="text-xs text-gray-500 mb-1 block">Tags (comma separated)</label>
                <input type="text" 
                       name="chillers[${index}][tags]" 
                       value="${tagsStr}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"
                       placeholder="Industrial Grade, 500-2000 TR, Energy Efficient">
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Central Plant Features
function addCentralFeature(feature = '') {
    const container = document.getElementById('central-features-container');
    const index = centralFeatureCount++;
    
    const html = `
        <div class="central-feature-item flex items-center gap-2">
            <input type="text" 
                   name="central_plant_features[]" 
                   value="${feature}"
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm"
                   placeholder="Feature description">
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Central Plant Services
function addCentralService(service = '') {
    const container = document.getElementById('central-services-container');
    const index = centralServiceCount++;
    
    const html = `
        <div class="central-service-item flex items-center gap-2">
            <input type="text" 
                   name="central_plant_services[]" 
                   value="${service}"
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm"
                   placeholder="Service description">
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeItem(button) {
    button.closest('.statistic-item, .overview-item, .support-feature-item, .building-system-item, .chiller-item, .central-feature-item, .central-service-item').remove();
}

// Initialize with existing data
document.addEventListener('DOMContentLoaded', function() {
    // Load statistics
    if (existingStatistics && existingStatistics.length > 0) {
        existingStatistics.forEach(stat => addStatistic(stat.value || '', stat.label || ''));
    }
    
    // Load overview cards
    if (existingOverviewCards && existingOverviewCards.length > 0) {
        existingOverviewCards.forEach(card => addOverviewCard(card.icon || '', card.title || '', card.description || ''));
    }
    
    // Load support features
    if (existingSupportFeatures && existingSupportFeatures.length > 0) {
        existingSupportFeatures.forEach(feature => addSupportFeature(feature.icon || '', feature.title || '', feature.description || ''));
    }
    
    // Load building systems
    if (existingBuildingSystems && existingBuildingSystems.length > 0) {
        existingBuildingSystems.forEach(system => {
            const features = system.features ? (Array.isArray(system.features) ? system.features : []) : [];
            addBuildingSystem(system.icon || '', system.title || '', system.description || '', features);
        });
    }
    
    // Load chillers
    if (existingChillers && existingChillers.length > 0) {
        existingChillers.forEach(chiller => {
            const tags = chiller.tags ? (Array.isArray(chiller.tags) ? chiller.tags : []) : [];
            addChiller(chiller.title || '', chiller.description || '', tags);
        });
    }
    
    // Load central plant features
    if (existingCentralFeatures && existingCentralFeatures.length > 0) {
        existingCentralFeatures.forEach(feature => addCentralFeature(feature));
    }
    
    // Load central plant services
    if (existingCentralServices && existingCentralServices.length > 0) {
        existingCentralServices.forEach(service => addCentralService(service));
    }
});
</script>
@endsection
