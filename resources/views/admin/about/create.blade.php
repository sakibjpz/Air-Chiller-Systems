@extends('layouts.admin')

@section('title', 'Create About Page')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Create About Page</h1>
        <p class="text-gray-600">Create a comprehensive about us page with all details</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 bg-gray-50 overflow-x-auto">
            <nav class="flex whitespace-nowrap px-2">
                <button type="button" onclick="showTab('hero')" class="tab-button active px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-blue-600 text-blue-600" id="tab-hero-btn">
                    <i class="fas fa-image mr-1"></i>Hero Section
                </button>
                <button type="button" onclick="showTab('overview')" class="tab-button px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-overview-btn">
                    <i class="fas fa-building mr-1"></i>Overview
                </button>
                <button type="button" onclick="showTab('vision-mission')" class="tab-button px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-vision-mission-btn">
                    <i class="fas fa-bullseye mr-1"></i>Vision & Mission
                </button>
                <button type="button" onclick="showTab('scope')" class="tab-button px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-scope-btn">
                    <i class="fas fa-cogs mr-1"></i>Scope of Work
                </button>
                <button type="button" onclick="showTab('services')" class="tab-button px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-services-btn">
                    <i class="fas fa-tools mr-1"></i>Services
                </button>
                <button type="button" onclick="showTab('cta')" class="tab-button px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-cta-btn">
                    <i class="fas fa-phone-alt mr-1"></i>CTA Section
                </button>
                <button type="button" onclick="showTab('seo')" class="tab-button px-3 py-2 text-xs sm:text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" id="tab-seo-btn">
                    <i class="fas fa-search mr-1"></i>SEO
                </button>
            </nav>
        </div>

        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data" id="aboutForm">
            @csrf
            
            <div class="p-4 sm:p-6">
                <!-- TAB 1: HERO SECTION -->
                <div id="tab-hero" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="hero_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Hero Title
                                </label>
                                <input type="text" 
                                       id="hero_title" 
                                       name="hero_title" 
                                       value="{{ old('hero_title', 'Engineering Excellence Since 1995') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="e.g., Engineering Excellence Since 1995">
                            </div>

                            <div>
                                <label for="hero_description" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Hero Description
                                </label>
                                <textarea id="hero_description" 
                                          name="hero_description" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Hero section description...">{{ old('hero_description') }}</textarea>
                            </div>
                        </div>

                        <div>
                            <label for="hero_image" class="block text-sm font-semibold text-gray-700 mb-1">
                                Hero Background Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition">
                                <div id="heroImagePreview" class="mb-2 hidden">
                                    <img id="previewHeroImage" class="mx-auto h-20 w-20 object-cover rounded-lg">
                                </div>
                                <input type="file" 
                                       id="hero_image" 
                                       name="hero_image" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewFile(this, 'previewHeroImage', 'heroImagePreview')">
                                <button type="button" 
                                        onclick="document.getElementById('hero_image').click()"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm">
                                    <i class="fas fa-upload mr-2"></i>Upload Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Stats -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-lg font-semibold text-gray-800">Hero Statistics</h3>
                            <button type="button" onclick="addHeroStat()" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-plus mr-1"></i>Add Stat
                            </button>
                        </div>
                        <div id="hero-stats-container" class="space-y-3">
                            <!-- Hero stats will be added here -->
                        </div>
                    </div>
                </div>

                <!-- TAB 2: OVERVIEW SECTION -->
                <div id="tab-overview" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="overview_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Overview Title
                                </label>
                                <input type="text" 
                                       id="overview_title" 
                                       name="overview_title" 
                                       value="{{ old('overview_title', 'Leading the Future of Industrial Engineering') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="overview_description" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Overview Description
                                </label>
                                <textarea id="overview_description" 
                                          name="overview_description" 
                                          rows="4"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Company overview...">{{ old('overview_description') }}</textarea>
                            </div>

                            <div>
                                <label for="overview_philosophy_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Philosophy Title
                                </label>
                                <input type="text" 
                                       id="overview_philosophy_title" 
                                       name="overview_philosophy_title" 
                                       value="{{ old('overview_philosophy_title', 'Our Philosophy') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="overview_philosophy_text" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Philosophy Text
                                </label>
                                <textarea id="overview_philosophy_text" 
                                          name="overview_philosophy_text" 
                                          rows="2"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Philosophy text...">{{ old('overview_philosophy_text') }}</textarea>
                            </div>

                            <div>
                                <label for="overview_philosophy_icon" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Philosophy Icon
                                </label>
                                <input type="text" 
                                       id="overview_philosophy_icon" 
                                       name="overview_philosophy_icon" 
                                       value="{{ old('overview_philosophy_icon', 'fas fa-bullseye') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="fas fa-bullseye">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="overview_image" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Overview Image
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition">
                                    <div id="overviewImagePreview" class="mb-2 hidden">
                                        <img id="previewOverviewImage" class="mx-auto h-20 w-20 object-cover rounded-lg">
                                    </div>
                                    <input type="file" 
                                           id="overview_image" 
                                           name="overview_image" 
                                           accept="image/*"
                                           class="hidden"
                                           onchange="previewFile(this, 'previewOverviewImage', 'overviewImagePreview')">
                                    <button type="button" 
                                            onclick="document.getElementById('overview_image').click()"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm">
                                        <i class="fas fa-upload mr-2"></i>Upload Image
                                    </button>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="overview_badge_value" class="block text-sm font-semibold text-gray-700 mb-1">
                                        Badge Value
                                    </label>
                                    <input type="text" 
                                           id="overview_badge_value" 
                                           name="overview_badge_value" 
                                           value="{{ old('overview_badge_value', '25+') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="25+">
                                </div>
                                <div>
                                    <label for="overview_badge_text" class="block text-sm font-semibold text-gray-700 mb-1">
                                        Badge Text
                                    </label>
                                    <input type="text" 
                                           id="overview_badge_text" 
                                           name="overview_badge_text" 
                                           value="{{ old('overview_badge_text', 'Years of Excellence') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Years of Excellence">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: VISION & MISSION -->
                <div id="tab-vision-mission" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Vision Section -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Vision</h3>
                            
                            <div>
                                <label for="vision_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Vision Title
                                </label>
                                <input type="text" 
                                       id="vision_title" 
                                       name="vision_title" 
                                       value="{{ old('vision_title', 'Our Vision') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="vision_description" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Vision Description
                                </label>
                                <textarea id="vision_description" 
                                          name="vision_description" 
                                          rows="4"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Vision description...">{{ old('vision_description') }}</textarea>
                            </div>

                            <div>
                                <label for="vision_icon" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Vision Icon
                                </label>
                                <input type="text" 
                                       id="vision_icon" 
                                       name="vision_icon" 
                                       value="{{ old('vision_icon', 'fas fa-eye') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="fas fa-eye">
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label class="text-sm font-semibold text-gray-700">Vision Points</label>
                                    <button type="button" onclick="addVisionPoint()" class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs">
                                        <i class="fas fa-plus mr-1"></i>Add Point
                                    </button>
                                </div>
                                <div id="vision-points-container" class="space-y-2">
                                    <!-- Vision points will be added here -->
                                </div>
                            </div>
                        </div>

                        <!-- Mission Section -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Mission</h3>
                            
                            <div>
                                <label for="mission_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Mission Title
                                </label>
                                <input type="text" 
                                       id="mission_title" 
                                       name="mission_title" 
                                       value="{{ old('mission_title', 'Our Mission') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="mission_description" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Mission Description
                                </label>
                                <textarea id="mission_description" 
                                          name="mission_description" 
                                          rows="4"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Mission description...">{{ old('mission_description') }}</textarea>
                            </div>

                            <div>
                                <label for="mission_icon" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Mission Icon
                                </label>
                                <input type="text" 
                                       id="mission_icon" 
                                       name="mission_icon" 
                                       value="{{ old('mission_icon', 'fas fa-bullseye') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="fas fa-bullseye">
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label class="text-sm font-semibold text-gray-700">Mission Points</label>
                                    <button type="button" onclick="addMissionPoint()" class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs">
                                        <i class="fas fa-plus mr-1"></i>Add Point
                                    </button>
                                </div>
                                <div id="mission-points-container" class="space-y-2">
                                    <!-- Mission points will be added here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: SCOPE OF WORK -->
                <div id="tab-scope" class="tab-content hidden">
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Scope Sections</h3>
                            <button type="button" onclick="addScopeSection()" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-plus mr-1"></i>Add Section
                            </button>
                        </div>
                    </div>
                    <div id="scope-sections-container" class="space-y-4">
                        <!-- Scope sections will be added here -->
                    </div>
                </div>

                <!-- TAB 5: SERVICES -->
                <div id="tab-services" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Modification Services -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-lg font-semibold text-gray-800">Modification Services</h3>
                                <button type="button" onclick="addModificationService()" class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs">
                                    <i class="fas fa-plus mr-1"></i>Add Service
                                </button>
                            </div>
                            <div id="modification-services-container" class="space-y-3">
                                <!-- Modification services will be added here -->
                            </div>
                        </div>

                        <!-- Service Support -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-lg font-semibold text-gray-800">Service Support</h3>
                                <button type="button" onclick="addServiceSupport()" class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs">
                                    <i class="fas fa-plus mr-1"></i>Add Service
                                </button>
                            </div>
                            <div id="service-support-container" class="space-y-3">
                                <!-- Service support will be added here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 6: CTA SECTION -->
                <div id="tab-cta" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="cta_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                    CTA Title
                                </label>
                                <input type="text" 
                                       id="cta_title" 
                                       name="cta_title" 
                                       value="{{ old('cta_title', 'Ready to Engineer Your Success?') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="cta_description" class="block text-sm font-semibold text-gray-700 mb-1">
                                    CTA Description
                                </label>
                                <textarea id="cta_description" 
                                          name="cta_description" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="CTA description...">{{ old('cta_description') }}</textarea>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="cta_primary_button_text" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Primary Button Text
                                </label>
                                <input type="text" 
                                       id="cta_primary_button_text" 
                                       name="cta_primary_button_text" 
                                       value="{{ old('cta_primary_button_text', 'Contact Our Team') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="cta_primary_button_link" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Primary Button Link
                                </label>
                                <input type="text" 
                                       id="cta_primary_button_link" 
                                       name="cta_primary_button_link" 
                                       value="{{ old('cta_primary_button_link', '/contact') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="/contact">
                            </div>

                            <div>
                                <label for="cta_secondary_button_text" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Secondary Button Text
                                </label>
                                <input type="text" 
                                       id="cta_secondary_button_text" 
                                       name="cta_secondary_button_text" 
                                       value="{{ old('cta_secondary_button_text', 'Explore Our Services') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="cta_secondary_button_link" class="block text-sm font-semibold text-gray-700 mb-1">
                                    Secondary Button Link
                                </label>
                                <input type="text" 
                                       id="cta_secondary_button_link" 
                                       name="cta_secondary_button_link" 
                                       value="{{ old('cta_secondary_button_link', '/services') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="/services">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: SEO -->
                <div id="tab-seo" class="tab-content hidden">
                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-semibold text-gray-700 mb-1">
                                Meta Title
                            </label>
                            <input type="text" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="SEO Title">
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-semibold text-gray-700 mb-1">
                                Meta Description
                            </label>
                            <textarea id="meta_description" 
                                      name="meta_description" 
                                      rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="SEO Description">{{ old('meta_description') }}</textarea>
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-semibold text-gray-700 mb-1">
                                Meta Keywords
                            </label>
                            <input type="text" 
                                   id="meta_keywords" 
                                   name="meta_keywords" 
                                   value="{{ old('meta_keywords') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="engineering, about us, company, comma, separated">
                            <p class="mt-1 text-xs text-gray-500">Comma separated keywords</p>
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <span class="ml-2 text-sm text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-4 sm:px-6 py-3 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-3">
                <div class="flex gap-2">
                    <button type="button" onclick="previousTab()" id="prevBtn" class="px-3 py-1.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm hidden">
                        <i class="fas fa-arrow-left mr-1"></i>Previous
                    </button>
                    <button type="button" onclick="nextTab()" id="nextBtn" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm">
                        Next<i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.about.index') }}" 
                       class="px-4 py-1.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-1.5 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">
                        <i class="fas fa-save mr-1"></i>Save Page
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
let currentTab = 'hero';
let heroStatCount = 0;
let visionPointCount = 0;
let missionPointCount = 0;
let scopeSectionCount = 0;
let modificationServiceCount = 0;
let serviceSupportCount = 0;

const tabs = ['hero', 'overview', 'vision-mission', 'scope', 'services', 'cta', 'seo'];

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

// Hero Stats
function addHeroStat(value = '', label = '') {
    const container = document.getElementById('hero-stats-container');
    const index = heroStatCount++;
    
    const html = `
        <div class="hero-stat-item bg-gray-50 p-3 rounded-lg border border-gray-200">
            <div class="flex gap-3">
                <input type="text" 
                       name="hero_stats[${index}][value]" 
                       value="${value}"
                       class="w-24 px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Value">
                <input type="text" 
                       name="hero_stats[${index}][label]" 
                       value="${label}"
                       class="flex-1 px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Label">
                <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Vision Points
function addVisionPoint(point = '') {
    const container = document.getElementById('vision-points-container');
    const index = visionPointCount++;
    
    const html = `
        <div class="vision-point-item flex gap-2">
            <input type="text" 
                   name="vision_points[]" 
                   value="${point}"
                   class="flex-1 px-2 py-1 border border-gray-300 rounded text-sm"
                   placeholder="Vision point">
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Mission Points
function addMissionPoint(point = '') {
    const container = document.getElementById('mission-points-container');
    const index = missionPointCount++;
    
    const html = `
        <div class="mission-point-item flex gap-2">
            <input type="text" 
                   name="mission_points[]" 
                   value="${point}"
                   class="flex-1 px-2 py-1 border border-gray-300 rounded text-sm"
                   placeholder="Mission point">
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Scope Sections
function addScopeSection(title = '', icon = '', color = '', points = []) {
    const container = document.getElementById('scope-sections-container');
    const index = scopeSectionCount++;
    
    const html = `
        <div class="scope-section-item bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-3 gap-3 mb-3">
                <input type="text" 
                       name="scope_sections[${index}][title]" 
                       value="${title}"
                       class="px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Title">
                <input type="text" 
                       name="scope_sections[${index}][icon]" 
                       value="${icon}"
                       class="px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Icon class">
                <div class="flex gap-2">
                    <input type="text" 
                           name="scope_sections[${index}][color]" 
                           value="${color}"
                           class="flex-1 px-2 py-1 border border-gray-300 rounded text-sm"
                           placeholder="Color (blue, green, purple)">
                    <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="text-xs text-gray-500 mb-1 block">Points (comma separated)</label>
                <input type="text" 
                       name="scope_sections[${index}][points]" 
                       value="${points.join(', ')}"
                       class="w-full px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Point 1, Point 2, Point 3">
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
}

// Modification Services
function addModificationService(icon = '', title = '', description = '') {
    const container = document.getElementById('modification-services-container');
    const index = modificationServiceCount++;
    
    const html = `
        <div class="modification-service-item bg-gray-50 p-3 rounded-lg border border-gray-200">
            <div class="grid grid-cols-3 gap-3 mb-2">
                <input type="text" 
                       name="modification_services[${index}][icon]" 
                       value="${icon}"
                       class="px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Icon">
                <input type="text" 
                       name="modification_services[${index}][title]" 
                       value="${title}"
                       class="px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Title">
                <div class="flex gap-2">
                    <input type="text" 
                           name="modification_services[${index}][description]" 
                           value="${description}"
                           class="flex-1 px-2 py-1 border border-gray-300 rounded text-sm"
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

// Service Support
function addServiceSupport(icon = '', title = '', description = '') {
    const container = document.getElementById('service-support-container');
    const index = serviceSupportCount++;
    
    const html = `
        <div class="service-support-item bg-gray-50 p-3 rounded-lg border border-gray-200">
            <div class="grid grid-cols-3 gap-3 mb-2">
                <input type="text" 
                       name="service_support[${index}][icon]" 
                       value="${icon}"
                       class="px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Icon">
                <input type="text" 
                       name="service_support[${index}][title]" 
                       value="${title}"
                       class="px-2 py-1 border border-gray-300 rounded text-sm"
                       placeholder="Title">
                <div class="flex gap-2">
                    <input type="text" 
                           name="service_support[${index}][description]" 
                           value="${description}"
                           class="flex-1 px-2 py-1 border border-gray-300 rounded text-sm"
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

function removeItem(button) {
    button.closest('.hero-stat-item, .vision-point-item, .mission-point-item, .scope-section-item, .modification-service-item, .service-support-item').remove();
}

// Add default items
document.addEventListener('DOMContentLoaded', function() {
    // Default hero stats
    addHeroStat('25+', 'Years Experience');
    addHeroStat('500+', 'Projects Completed');
    addHeroStat('50+', 'Expert Engineers');
    
    // Default vision points
    addVisionPoint('Industry leadership in engineering innovation');
    addVisionPoint('Sustainable engineering practices');
    addVisionPoint('National engineering excellence benchmark');
    
    // Default mission points
    addMissionPoint('Client-centric engineering solutions');
    addMissionPoint('Continuous innovation and improvement');
    addMissionPoint('Excellence in execution and delivery');
    
    // Default scope sections
    addScopeSection('Supply', 'fas fa-truck-loading', 'blue', [
        'HVAC Systems & Components',
        'Electrical Panels & Switchgear',
        'Pumping & Compression Systems',
        'Industrial Automation Equipment',
        'Safety & Control Systems'
    ]);
    addScopeSection('Application', 'fas fa-cogs', 'green', [
        'System Design & Engineering',
        'Installation & Commissioning',
        'System Integration',
        'Performance Optimization',
        'Technical Consultation'
    ]);
    addScopeSection('Manufacturing', 'fas fa-industry', 'purple', [
        'Custom Fabrication',
        'Assembly & Production',
        'Quality Control & Testing',
        'Prototype Development',
        'Batch Production'
    ]);
    
    // Default modification services
    addModificationService('fas fa-redo', 'System Upgrades', 'Modernization of existing systems for enhanced performance and efficiency.');
    addModificationService('fas fa-exchange-alt', 'Retrofitting', 'Integration of new technologies into existing industrial setups.');
    addModificationService('fas fa-cube', 'Custom Modifications', 'Tailored engineering modifications to meet specific operational requirements.');
    
    // Default service support
    addServiceSupport('fas fa-calendar-check', 'Preventive Maintenance', 'Regular maintenance schedules to prevent breakdowns and ensure optimal performance.');
    addServiceSupport('fas fa-ambulance', 'Emergency Support', '24/7 emergency technical support and rapid response teams.');
    addServiceSupport('fas fa-graduation-cap', 'Training & Capacity Building', 'Comprehensive training programs for operational staff and technicians.');
});
</script>
@endsection
