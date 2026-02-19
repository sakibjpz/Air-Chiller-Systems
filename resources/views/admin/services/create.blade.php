@extends('layouts.admin')

@section('title', 'Add New Service')

@section('content')
<div class="container mx-auto px-4 py-4 sm:py-6 md:py-8 max-w-full sm:max-w-7xl">
    <div class="mb-4 sm:mb-6 md:mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-blue-800 mb-1 sm:mb-2">Add New Service</h1>
        <p class="text-sm sm:text-base text-gray-600">Create a comprehensive service page with all details</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Tabs Navigation - Responsive with horizontal scroll on mobile -->
        <div class="border-b border-gray-200 bg-gray-50 overflow-x-auto">
            <nav class="flex whitespace-nowrap px-2 sm:px-4" style="min-width: min-content;">
                <button type="button" onclick="showTab('basic')" class="tab-button active px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-blue-600 text-blue-600" id="tab-basic-btn">
                    <i class="fas fa-info-circle mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Basic Info</span>
                    <span class="xs:hidden">Basic</span>
                </button>
                <button type="button" onclick="showTab('hero')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-hero-btn">
                    <i class="fas fa-image mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Hero Section</span>
                    <span class="xs:hidden">Hero</span>
                </button>
                <button type="button" onclick="showTab('statistics')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-statistics-btn">
                    <i class="fas fa-chart-bar mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Statistics</span>
                    <span class="xs:hidden">Stats</span>
                </button>
                <button type="button" onclick="showTab('overview')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-overview-btn">
                    <i class="fas fa-th-large mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Overview Cards</span>
                    <span class="xs:hidden">Cards</span>
                </button>
                <button type="button" onclick="showTab('support')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-support-btn">
                    <i class="fas fa-headset mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Support Section</span>
                    <span class="xs:hidden">Support</span>
                </button>
                <button type="button" onclick="showTab('building')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-building-btn">
                    <i class="fas fa-building mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Building Systems</span>
                    <span class="xs:hidden">Building</span>
                </button>
                <button type="button" onclick="showTab('chillers')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-chillers-btn">
                    <i class="fas fa-snowflake mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Chillers</span>
                    <span class="xs:hidden">Chillers</span>
                </button>
                <button type="button" onclick="showTab('central')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-central-btn">
                    <i class="fas fa-industry mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">Central Plant</span>
                    <span class="xs:hidden">Plant</span>
                </button>
                <button type="button" onclick="showTab('cta')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-cta-btn">
                    <i class="fas fa-phone-alt mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">CTA Section</span>
                    <span class="xs:hidden">CTA</span>
                </button>
                <button type="button" onclick="showTab('seo')" class="tab-button px-2 sm:px-3 md:px-4 py-2 sm:py-3 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-seo-btn">
                    <i class="fas fa-search mr-1 sm:mr-2"></i>
                    <span class="hidden xs:inline">SEO</span>
                    <span class="xs:hidden">SEO</span>
                </button>
            </nav>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
            @csrf
            
            <div class="p-3 sm:p-4 md:p-6">
                <!-- TAB 1: BASIC INFO -->
                <div id="tab-basic" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <div class="space-y-4 sm:space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Engineering Services"
                                       required>
                                @error('title')
                                    <p class="mt-1 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subtitle -->
                            <div>
                                <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Subtitle
                                </label>
                                <input type="text" 
                                       id="subtitle" 
                                       name="subtitle" 
                                       value="{{ old('subtitle') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Complete Engineering Solutions">
                            </div>

                            <!-- Icon -->
                            <div>
                                <label for="icon" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Font Awesome Icon
                                </label>
                                <input type="text" 
                                       id="icon" 
                                       name="icon" 
                                       value="{{ old('icon', 'fas fa-cogs') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="fas fa-cogs">
                                <p class="mt-1 text-xs text-gray-500">Icon for service listing</p>
                            </div>

                            <!-- Sort Order -->
                            <div>
                                <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Sort Order
                                </label>
                                <input type="number" 
                                       id="sort_order" 
                                       name="sort_order" 
                                       value="{{ old('sort_order', 0) }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       min="0">
                            </div>
                        </div>

                        <div class="space-y-4 sm:space-y-6">
                            <!-- Main Image -->
                            <div>
                                <label for="image" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Main Image
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-3 sm:p-4 text-center hover:border-blue-500 transition duration-300">
                                    <div id="imagePreview" class="mb-2 sm:mb-3 hidden">
                                        <img id="previewImage" class="mx-auto h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 object-cover rounded-lg">
                                    </div>
                                    <input type="file" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*"
                                           class="hidden"
                                           onchange="previewFile(this, 'previewImage', 'imagePreview')">
                                    <button type="button" 
                                            onclick="document.getElementById('image').click()"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-1.5 sm:py-2 px-3 sm:px-4 rounded-lg transition duration-300 text-xs sm:text-sm">
                                        <i class="fas fa-upload mr-1 sm:mr-2"></i>Upload Image
                                    </button>
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="is_active" 
                                               value="1" 
                                               {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                                               class="h-3 w-3 sm:h-4 sm:w-4 text-blue-600 focus:ring-blue-500"
                                               required>
                                        <span class="ml-1 sm:ml-2 text-xs sm:text-sm text-gray-700">Active</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="is_active" 
                                               value="0" 
                                               {{ old('is_active') == '0' ? 'checked' : '' }}
                                               class="h-3 w-3 sm:h-4 sm:w-4 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-1 sm:ml-2 text-xs sm:text-sm text-gray-700">Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-4 sm:mt-6">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="3"
                                  class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Main service description..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- TAB 2: HERO SECTION -->
                <div id="tab-hero" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <div class="space-y-4 sm:space-y-6">
                            <div>
                                <label for="hero_title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Hero Title
                                </label>
                                <input type="text" 
                                       id="hero_title" 
                                       name="hero_title" 
                                       value="{{ old('hero_title') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="e.g., Comprehensive Engineering Services">
                            </div>

                            <div>
                                <label for="hero_description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Hero Description
                                </label>
                                <textarea id="hero_description" 
                                          name="hero_description" 
                                          rows="3"
                                          class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                          placeholder="Hero section description...">{{ old('hero_description') }}</textarea>
                            </div>
                        </div>

                        <div>
                            <label for="hero_image" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Hero Background Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3 sm:p-4 text-center hover:border-blue-500 transition duration-300">
                                <div id="heroImagePreview" class="mb-2 sm:mb-3 hidden">
                                    <img id="previewHeroImage" class="mx-auto h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="hero_image" 
                                       name="hero_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewHeroImage', 'heroImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('hero_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-1.5 sm:py-2 px-3 sm:px-4 rounded-lg transition duration-300 text-xs sm:text-sm">
                                    <i class="fas fa-upload mr-1 sm:mr-2"></i>Upload Image
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: STATISTICS -->
                <div id="tab-statistics" class="tab-content hidden">
                    <div class="mb-3 sm:mb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">Statistics</h3>
                        <button type="button" onclick="addStatistic()" class="bg-green-600 hover:bg-green-700 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-xs sm:text-sm w-full sm:w-auto">
                            <i class="fas fa-plus mr-1 sm:mr-2"></i>Add Statistic
                        </button>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-500 mb-4 sm:mb-6">Add statistics like "24/7 Support", "100% Quality", etc.</p>
                    
                    <div id="statistics-container" class="space-y-3 sm:space-y-4">
                        <!-- Statistics will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 4: OVERVIEW CARDS -->
                <div id="tab-overview" class="tab-content hidden">
                    <div class="mb-3 sm:mb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">Overview Cards</h3>
                        <button type="button" onclick="addOverviewCard()" class="bg-green-600 hover:bg-green-700 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-xs sm:text-sm w-full sm:w-auto">
                            <i class="fas fa-plus mr-1 sm:mr-2"></i>Add Card
                        </button>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-500 mb-4 sm:mb-6">Add service overview cards (Complete Support, Building Systems, etc.)</p>
                    
                    <div id="overview-cards-container" class="space-y-3 sm:space-y-4">
                        <!-- Overview cards will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 5: SUPPORT SECTION -->
                <div id="tab-support" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                        <div>
                            <label for="support_title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Support Section Title
                            </label>
                            <input type="text" 
                                   id="support_title" 
                                   name="support_title" 
                                   value="{{ old('support_title', 'Complete Support & Solutions') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                        
                        <div>
                            <label for="support_image" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Support Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3 sm:p-4 text-center hover:border-blue-500 transition duration-300">
                                <div id="supportImagePreview" class="mb-2 sm:mb-3 hidden">
                                    <img id="previewSupportImage" class="mx-auto h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="support_image" 
                                       name="support_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewSupportImage', 'supportImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('support_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-1.5 sm:py-2 px-3 sm:px-4 rounded-lg transition duration-300 text-xs sm:text-sm">
                                    <i class="fas fa-upload mr-1 sm:mr-2"></i>Upload Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 sm:mb-4">
                        <label for="support_description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                            Support Section Description
                        </label>
                        <textarea id="support_description" 
                                  name="support_description" 
                                  rows="2"
                                  class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Description for support section...">{{ old('support_description') }}</textarea>
                    </div>

                    <div class="mb-3 sm:mb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <h4 class="text-sm sm:text-md font-semibold text-gray-700">Support Features</h4>
                        <button type="button" onclick="addSupportFeature()" class="bg-green-600 hover:bg-green-700 text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded-lg text-xs w-full sm:w-auto">
                            <i class="fas fa-plus mr-1"></i>Add Feature
                        </button>
                    </div>
                    
                    <div id="support-features-container" class="space-y-3 sm:space-y-4">
                        <!-- Support features will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 6: BUILDING SYSTEMS -->
                <div id="tab-building" class="tab-content hidden">
                    <div class="mb-3 sm:mb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">Building Systems</h3>
                        <button type="button" onclick="addBuildingSystem()" class="bg-green-600 hover:bg-green-700 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-xs sm:text-sm w-full sm:w-auto">
                            <i class="fas fa-plus mr-1 sm:mr-2"></i>Add System
                        </button>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-500 mb-4 sm:mb-6">Add building system upgrades (HVAC, Electrical, Automation)</p>
                    
                    <div id="building-systems-container" class="space-y-3 sm:space-y-4">
                        <!-- Building systems will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 7: CHILLERS -->
                <div id="tab-chillers" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                        <div>
                            <label for="chillers_title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Chillers Section Title
                            </label>
                            <input type="text" 
                                   id="chillers_title" 
                                   name="chillers_title" 
                                   value="{{ old('chillers_title', 'Chillers & Cooling Solutions') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                        
                        <div>
                            <label for="chillers_description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Chillers Section Description
                            </label>
                            <input type="text" 
                                   id="chillers_description" 
                                   name="chillers_description" 
                                   value="{{ old('chillers_description') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="Description for chillers section">
                        </div>
                    </div>

                    <div class="mb-3 sm:mb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <h4 class="text-sm sm:text-md font-semibold text-gray-700">Chiller Types</h4>
                        <button type="button" onclick="addChiller()" class="bg-green-600 hover:bg-green-700 text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded-lg text-xs w-full sm:w-auto">
                            <i class="fas fa-plus mr-1"></i>Add Chiller
                        </button>
                    </div>
                    
                    <div id="chillers-container" class="space-y-3 sm:space-y-4">
                        <!-- Chillers will be added here dynamically -->
                    </div>
                </div>

                <!-- TAB 8: CENTRAL PLANT -->
                <div id="tab-central" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                        <div>
                            <label for="central_plant_title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Central Plant Title
                            </label>
                            <input type="text" 
                                   id="central_plant_title" 
                                   name="central_plant_title" 
                                   value="{{ old('central_plant_title', 'Central Plant & District Cooling') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                        
                        <div>
                            <label for="central_plant_stats" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Stats Badge (e.g., 40% Energy Savings)
                            </label>
                            <input type="text" 
                                   id="central_plant_stats" 
                                   name="central_plant_stats" 
                                   value="{{ old('central_plant_stats', '40% Energy Savings') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        </div>
                    </div>

                    <div class="mb-4 sm:mb-6">
                        <label for="central_plant_description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                            Central Plant Description
                        </label>
                        <textarea id="central_plant_description" 
                                  name="central_plant_description" 
                                  rows="2"
                                  class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                  placeholder="Description for central plant section...">{{ old('central_plant_description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                        <div>
                            <label for="central_plant_image" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Central Plant Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3 sm:p-4 text-center hover:border-blue-500 transition duration-300">
                                <div id="plantImagePreview" class="mb-2 sm:mb-3 hidden">
                                    <img id="previewPlantImage" class="mx-auto h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="central_plant_image" 
                                       name="central_plant_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewPlantImage', 'plantImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('central_plant_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-1.5 sm:py-2 px-3 sm:px-4 rounded-lg transition duration-300 text-xs sm:text-sm">
                                    <i class="fas fa-upload mr-1 sm:mr-2"></i>Upload Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-sm sm:text-md font-semibold text-gray-700 mb-2 sm:mb-3">Central Plant Features</h4>
                        <div id="central-features-container" class="space-y-2 sm:space-y-3">
                            <!-- Central plant features will be added here -->
                        </div>
                        <button type="button" onclick="addCentralFeature()" class="mt-2 text-blue-600 hover:text-blue-800 text-xs sm:text-sm">
                            <i class="fas fa-plus mr-1"></i>Add Feature
                        </button>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-sm sm:text-md font-semibold text-gray-700 mb-2 sm:mb-3">Central Plant Services</h4>
                        <div id="central-services-container" class="space-y-2 sm:space-y-3">
                            <!-- Central plant services will be added here -->
                        </div>
                        <button type="button" onclick="addCentralService()" class="mt-2 text-blue-600 hover:text-blue-800 text-xs sm:text-sm">
                            <i class="fas fa-plus mr-1"></i>Add Service
                        </button>
                    </div>
                </div>

                <!-- TAB 9: CTA SECTION -->
                <div id="tab-cta" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <div class="space-y-4 sm:space-y-6">
                            <div>
                                <label for="cta_title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    CTA Title
                                </label>
                                <input type="text" 
                                       id="cta_title" 
                                       name="cta_title" 
                                       value="{{ old('cta_title', 'Need Engineering Solutions?') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            </div>

                            <div>
                                <label for="cta_button_text" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Button Text
                                </label>
                                <input type="text" 
                                       id="cta_button_text" 
                                       name="cta_button_text" 
                                       value="{{ old('cta_button_text', 'Get a Quote') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            </div>

                            <div>
                                <label for="cta_button_link" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Button Link
                                </label>
                                <input type="text" 
                                       id="cta_button_link" 
                                       name="cta_button_link" 
                                       value="{{ old('cta_button_link') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="/contact">
                            </div>
                        </div>

                        <div class="space-y-4 sm:space-y-6">
                            <div>
                                <label for="cta_description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    CTA Description
                                </label>
                                <textarea id="cta_description" 
                                          name="cta_description" 
                                          rows="3"
                                          class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                          placeholder="Description for CTA section...">{{ old('cta_description') }}</textarea>
                            </div>

                            <div>
                                <label for="cta_phone" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                    Phone Number
                                </label>
                                <input type="text" 
                                       id="cta_phone" 
                                       name="cta_phone" 
                                       value="{{ old('cta_phone', '+880(121) 456 77') }}"
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                       placeholder="Contact phone number">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 10: SEO -->
                <div id="tab-seo" class="tab-content hidden">
                    <div class="space-y-4 sm:space-y-6">
                        <div>
                            <label for="meta_title" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Meta Title
                            </label>
                            <input type="text" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="SEO Title - leave empty to use service title">
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Meta Description
                            </label>
                            <textarea id="meta_description" 
                                      name="meta_description" 
                                      rows="3"
                                      class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                      placeholder="SEO Description">{{ old('meta_description') }}</textarea>
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                Meta Keywords
                            </label>
                            <input type="text" 
                                   id="meta_keywords" 
                                   name="meta_keywords" 
                                   value="{{ old('meta_keywords') }}"
                                   class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                   placeholder="engineering, services, hvac, comma, separated">
                            <p class="mt-1 text-xs text-gray-500">Comma separated keywords</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions - Responsive -->
            <div class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-3">
                <div class="flex gap-2 w-full sm:w-auto justify-center sm:justify-start">
                    <button type="button" onclick="previousTab()" id="prevBtn" class="px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300 text-xs sm:text-sm hidden">
                        <i class="fas fa-arrow-left mr-1 sm:mr-2"></i>Prev
                    </button>
                    <button type="button" onclick="nextTab()" id="nextBtn" class="px-3 sm:px-4 py-1.5 sm:py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300 text-xs sm:text-sm">
                        Next<i class="fas fa-arrow-right ml-1 sm:ml-2"></i>
                    </button>
                </div>
                <div class="flex gap-2 w-full sm:w-auto justify-center sm:justify-end">
                    <a href="{{ route('admin.services.index') }}" 
                       class="px-3 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-300 text-xs sm:text-sm">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-3 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300 text-xs sm:text-sm">
                        <i class="fas fa-save mr-1 sm:mr-2"></i>Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
/* Responsive breakpoints */
@media (max-width: 480px) {
    .xs\:inline {
        display: inline;
    }
    .xs\:hidden {
        display: none;
    }
}

/* Tab navigation scrollbar styling */
.overflow-x-auto {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e0 #f1f5f9;
}

.overflow-x-auto::-webkit-scrollbar {
    height: 4px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background-color: #cbd5e0;
    border-radius: 20px;
}
</style>

<script>
let currentTab = 'basic';
let statisticCount = 0;
let overviewCardCount = 0;
let supportFeatureCount = 0;
let buildingSystemCount = 0;
let chillerCount = 0;
let centralFeatureCount = 0;
let centralServiceCount = 0;

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
        <div class="statistic-item bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <input type="text" 
                           name="statistics[${index}][value]" 
                           value="${value}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Value (e.g., 24/7)">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="statistics[${index}][label]" 
                           value="${label}"
                           class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Label (e.g., Support)">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                        <i class="fas fa-trash text-sm sm:text-base"></i>
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
        <div class="overview-item bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <input type="text" 
                           name="overview_cards[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Icon class">
                </div>
                <div>
                    <input type="text" 
                           name="overview_cards[${index}][title]" 
                           value="${title}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="overview_cards[${index}][description]" 
                           value="${description}"
                           class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                        <i class="fas fa-trash text-sm sm:text-base"></i>
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
        <div class="support-feature-item bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <input type="text" 
                           name="support_features[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Icon class">
                </div>
                <div>
                    <input type="text" 
                           name="support_features[${index}][title]" 
                           value="${title}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="support_features[${index}][description]" 
                           value="${description}"
                           class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                        <i class="fas fa-trash text-sm sm:text-base"></i>
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
    
    const html = `
        <div class="building-system-item bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-3">
                <div>
                    <input type="text" 
                           name="building_systems[${index}][icon]" 
                           value="${icon}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Icon class">
                </div>
                <div>
                    <input type="text" 
                           name="building_systems[${index}][title]" 
                           value="${title}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="building_systems[${index}][description]" 
                           value="${description}"
                           class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                        <i class="fas fa-trash text-sm sm:text-base"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="text-xs text-gray-500 mb-1 block">Features (comma separated)</label>
                <input type="text" 
                       name="building_systems[${index}][features]" 
                       value="${features.join(', ')}"
                       class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                       placeholder="Feature 1, Feature 2, Feature 3">
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Chillers
function addChiller(title = '', description = '', tags = [], image = '') {
    const container = document.getElementById('chillers-container');
    const index = chillerCount++;
    
    const html = `
        <div class="chiller-item bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                <div>
                    <input type="text" 
                           name="chillers[${index}][title]" 
                           value="${title}"
                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Title">
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" 
                           name="chillers[${index}][description]" 
                           value="${description}"
                           class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                           placeholder="Description">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                        <i class="fas fa-trash text-sm sm:text-base"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="text-xs text-gray-500 mb-1 block">Tags (comma separated)</label>
                <input type="text" 
                       name="chillers[${index}][tags]" 
                       value="${tags.join(', ')}"
                       class="w-full px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
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
                   class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                   placeholder="Feature description">
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                <i class="fas fa-times text-sm sm:text-base"></i>
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
                   class="flex-1 px-2 sm:px-3 py-1.5 sm:py-2 border border-gray-300 rounded-lg text-xs sm:text-sm"
                   placeholder="Service description">
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 flex-shrink-0">
                <i class="fas fa-times text-sm sm:text-base"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

function removeItem(button) {
    button.closest('.statistic-item, .overview-item, .support-feature-item, .building-system-item, .chiller-item, .central-feature-item, .central-service-item').remove();
}

// Add default items
document.addEventListener('DOMContentLoaded', function() {
    // Default statistics
    addStatistic('24/7', 'Support');
    addStatistic('100%', 'Quality');
    addStatistic('500+', 'Projects');
    
    // Default overview cards
    addOverviewCard('fas fa-headset', 'Complete Support', 'End-to-end technical assistance');
    addOverviewCard('fas fa-building', 'Building Systems', 'Smart building solutions');
    addOverviewCard('fas fa-snowflake', 'Chillers', 'Cooling system expertise');
    addOverviewCard('fas fa-industry', 'Central Plants', 'District cooling systems');
    
    // Default support features
    addSupportFeature('fas fa-phone-alt', '24/7 Technical Support', 'Round-the-clock technical assistance');
    addSupportFeature('fas fa-calendar-check', 'Preventive Maintenance', 'Scheduled maintenance programs');
    addSupportFeature('fas fa-tools', 'Emergency Repairs', 'Immediate response services');
    addSupportFeature('fas fa-user-graduate', 'Training Programs', 'Comprehensive staff training');
    
    // Default building systems
    addBuildingSystem('fas fa-wind', 'HVAC System Upgrades', 'Energy-efficient HVAC modernization', [
        'Energy efficiency optimization',
        'Smart controls integration',
        'Retro-commissioning'
    ]);
    addBuildingSystem('fas fa-bolt', 'Electrical System Modernization', 'Upgrade of electrical systems', [
        'Panel upgrades',
        'Energy management systems',
        'Lighting retrofits'
    ]);
    addBuildingSystem('fas fa-robot', 'Building Automation', 'Integration of smart building systems', [
        'BMS integration',
        'IoT sensor networks',
        'Remote monitoring'
    ]);
    
    // Default chillers
    addChiller('Centrifugal Chillers', 'High-capacity centrifugal chillers for large-scale industrial applications', [
        'Industrial Grade',
        '500-2000 TR',
        'Energy Efficient',
        'Low Maintenance'
    ]);
    addChiller('Screw Chillers', 'Reliable screw chillers for commercial and medium-scale applications', [
        'Commercial Grade',
        '100-500 TR',
        'Compact Design',
        'Quiet Operation'
    ]);
    
    // Default central plant features
    addCentralFeature('Energy Efficiency');
    addCentralFeature('Cost Effective');
    addCentralFeature('Reliability');
    addCentralFeature('Scalability');
    
    // Default central plant services
    addCentralService('Plant Design');
    addCentralService('Installation');
    addCentralService('Operation & Maintenance');
});
</script>
@endsection