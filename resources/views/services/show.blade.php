@extends('layouts.frontend')

@section('title', ($service->meta_title ?? $service->title) . ' - Mohiuddin Engineering')

@section('meta_description', $service->meta_description ?? '')
@section('meta_keywords', $service->meta_keywords ?? '')

@section('content')
<!-- ================= HERO SECTION ================= -->
<section class="relative pt-20 pb-16 md:pt-28 md:pb-24 overflow-hidden bg-gradient-to-br from-teal-900 via-teal-800 to-cyan-700">
    <div class="absolute inset-0 bg-[url('{{ $service->hero_image ? asset($service->hero_image) : 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80' }}')] bg-cover bg-center opacity-15"></div>
    
    <div class="container px-4 mx-auto relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 md:mb-6 leading-tight">
                {!! $service->hero_title ?? $service->title !!}
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-teal-100 mb-6 md:mb-8 leading-relaxed max-w-2xl mx-auto">
                {{ $service->hero_description ?? $service->description }}
            </p>
            
            <!-- Mobile Stats -->
            @if($service->statistics)
            <div class="grid grid-cols-2 gap-3 mt-8 md:hidden">
                @foreach($service->statistics as $stat)
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-yellow-400 mb-1">{{ $stat['value'] }}</div>
                    <div class="text-xs text-teal-100">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
            
            <!-- Desktop Stats -->
            <div class="hidden md:flex flex-wrap justify-center gap-4 mt-10">
                @foreach($service->statistics as $stat)
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[180px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">{{ $stat['value'] }}</div>
                    <div class="text-teal-100">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-12 md:h-20">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,138.7C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- ================= SERVICE INTRO ================= -->
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    {{ $service->title }}
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    {{ $service->subtitle ?? 'Complete engineering solutions for every need' }}
                </p>
            </div>
            
            <!-- Service Overview Cards -->
            @if($service->overview_cards)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-12 md:mb-16">
                @foreach($service->overview_cards as $card)
                <div class="bg-teal-50 rounded-xl p-5 md:p-6 text-center">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                        <i class="{{ $card['icon'] ?? 'fas fa-cog' }} text-teal-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">{{ $card['title'] }}</h3>
                    <p class="text-gray-600 text-sm md:text-base">{{ $card['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>

<!-- ================= COMPLETE SUPPORT & SOLUTIONS ================= -->
@if($service->support_features)
<section class="py-12 md:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    {{ $service->support_title ?? 'Complete Support & Solutions' }}
                </h2>
                @if($service->support_description)
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    {{ $service->support_description }}
                </p>
                @endif
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                <!-- Mobile Image First -->
                @if($service->support_image)
                <div class="lg:hidden">
                    <div class="relative overflow-hidden rounded-xl md:rounded-2xl shadow-lg">
                        <img src="{{ asset($service->support_image) }}" 
                             alt="Technical Support"
                             class="w-full h-64 sm:h-80 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-teal-900/40 to-transparent"></div>
                    </div>
                </div>
                @endif
                
                <!-- Content -->
                <div>
                    <div class="space-y-5 md:space-y-6">
                        @foreach($service->support_features as $feature)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-teal-100 rounded-lg md:rounded-xl flex items-center justify-center mr-3 md:mr-4">
                                <i class="{{ $feature['icon'] ?? 'fas fa-check' }} text-teal-600 text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-1 md:mb-2">{{ $feature['title'] }}</h3>
                                <p class="text-gray-600 text-sm md:text-base">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Desktop Image -->
                @if($service->support_image)
                <div class="hidden lg:block">
                    <div class="relative overflow-hidden rounded-2xl shadow-xl">
                        <img src="{{ asset($service->support_image) }}" 
                             alt="Technical Support"
                             class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-teal-900/40 to-transparent"></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- ================= BUILDING SYSTEMS UPGRADES ================= -->
@if($service->building_systems)
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Building Systems Upgrades
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    Modernization and optimization of building management systems
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                @foreach($service->building_systems as $system)
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-teal-100 rounded-lg md:rounded-xl flex items-center justify-center mb-3 md:mb-4">
                        <i class="{{ $system['icon'] ?? 'fas fa-wind' }} text-teal-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">{{ $system['title'] }}</h3>
                    <p class="text-gray-600 text-sm md:text-base mb-3">{{ $system['description'] }}</p>
                    @if(isset($system['features']))
                    <ul class="space-y-1 text-sm">
                        @foreach(explode(',', $system['features']) as $feature)
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            {{ trim($feature) }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- ================= CHILLERS SECTION ================= -->
@if($service->chillers)
<section class="py-12 md:py-20 bg-gradient-to-b from-teal-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    {{ $service->chillers_title ?? 'Chillers & Cooling Solutions' }}
                </h2>
                @if($service->chillers_description)
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    {{ $service->chillers_description }}
                </p>
                @endif
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                @foreach($service->chillers as $chiller)
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden">
                    <div class="relative h-48 md:h-56 overflow-hidden bg-gradient-to-r from-teal-500 to-cyan-500">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-snowflake text-white/30 text-8xl"></i>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            @if(isset($chiller['tags']))
                                @php
                                    $tags = explode(',', $chiller['tags']);
                                    $firstTag = trim($tags[0] ?? '');
                                @endphp
                                @if($firstTag)
                                <span class="bg-white text-teal-700 font-semibold px-3 py-1 rounded-full text-sm">
                                    {{ $firstTag }}
                                </span>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="p-5 md:p-6">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">{{ $chiller['title'] }}</h3>
                        <p class="text-gray-600 text-sm md:text-base mb-4">{{ $chiller['description'] }}</p>
                        @if(isset($chiller['tags']))
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $chiller['tags']) as $tag)
                            @php $trimmedTag = trim($tag); @endphp
                            @if($trimmedTag && $trimmedTag != $firstTag)
                            <span class="bg-teal-100 text-teal-700 text-xs px-3 py-1 rounded-full">{{ $trimmedTag }}</span>
                            @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Additional Chiller Types (if any in overview cards) -->
            @if($service->overview_cards && count($service->overview_cards) > 4)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5 mt-8 md:mt-10">
                @foreach($service->overview_cards->slice(4) as $card)
                <div class="bg-white rounded-lg md:rounded-xl p-4 md:p-5 text-center border border-gray-200">
                    <i class="{{ $card['icon'] ?? 'fas fa-water' }} text-teal-500 text-lg md:text-xl mb-2"></i>
                    <h4 class="font-semibold text-gray-900 text-sm md:text-base">{{ $card['title'] }}</h4>
                    <p class="text-gray-600 text-xs md:text-sm mt-1">{{ $card['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- ================= CENTRAL PLANT & DISTRICT COOLING ================= -->
@if($service->central_plant_title || $service->central_plant_features)
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    {{ $service->central_plant_title ?? 'Central Plant & District Cooling' }}
                </h2>
                @if($service->central_plant_description)
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    {{ $service->central_plant_description }}
                </p>
                @endif
            </div>
            
            <div class="bg-gradient-to-r from-teal-900 to-teal-800 rounded-xl md:rounded-2xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Content -->
                    <div class="p-6 md:p-8 lg:p-10 text-white">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 md:mb-4">District Cooling Systems</h3>
                        <p class="text-teal-100 text-sm md:text-base mb-5 md:mb-6">
                            Centralized cooling plants that serve multiple buildings through a network of underground pipes, offering energy efficiency and cost savings.
                        </p>
                        
                        @if($service->central_plant_features)
                        <div class="space-y-4 md:space-y-5">
                            @foreach($service->central_plant_features as $feature)
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-yellow-400 mt-1 mr-3 text-sm md:text-base"></i>
                                <div>
                                    <h4 class="font-semibold text-sm md:text-base">{{ $feature }}</h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    
                    <!-- Image/Diagram -->
                    <div class="relative min-h-[300px] md:min-h-[400px]">
                        @if($service->central_plant_image)
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset($service->central_plant_image) }}')"></div>
                        @else
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-600 to-cyan-600"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-900/80 to-transparent lg:bg-gradient-to-l"></div>
                        
                        <!-- Overlay Content -->
                        <div class="relative h-full flex items-center justify-center p-6">
                            @if($service->central_plant_stats)
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 md:p-6 text-white text-center max-w-xs">
                                <div class="text-3xl md:text-4xl font-bold mb-2">{{ $service->central_plant_stats }}</div>
                                <div class="text-sm md:text-base">Energy Savings</div>
                                <div class="text-xs md:text-sm text-teal-200 mt-2">Compared to traditional systems</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Central Plant Services -->
            @if($service->central_plant_services)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-6 mt-8 md:mt-10">
                @foreach($service->central_plant_services as $plantService)
                <div class="bg-gray-50 rounded-xl p-5 md:p-6">
                    <h4 class="font-semibold text-gray-900 text-lg md:text-xl mb-2">{{ $plantService }}</h4>
                    <p class="text-gray-600 text-sm md:text-base">Complete {{ strtolower($plantService) }} for central cooling plants</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- ================= CTA SECTION ================= -->
<section class="py-12 md:py-20 bg-gradient-to-r from-teal-900 to-teal-800">
    <div class="container px-4 mx-auto">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 md:mb-6">
                {{ $service->cta_title ?? 'Need Engineering Solutions?' }}
            </h2>
            <p class="text-lg sm:text-xl text-teal-100 mb-6 md:mb-8 max-w-2xl mx-auto">
                {{ $service->cta_description ?? 'Contact us for customized engineering services tailored to your needs' }}
            </p>
            
            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
                <a href="{{ $service->cta_button_link ?? '#' }}" 
                   class="bg-white text-teal-700 hover:bg-teal-50 font-semibold px-6 py-3 md:px-8 md:py-4 rounded-lg md:rounded-xl text-base md:text-lg transition duration-300 shadow-lg">
                    <i class="fas fa-phone-alt mr-2 md:mr-3"></i>
                    {{ $service->cta_button_text ?? 'Get a Quote' }}
                </a>
                <a href="tel:{{ $service->cta_phone ?? '+88012145677' }}" 
                   class="bg-transparent border-2 border-white text-white hover:bg-white/10 font-semibold px-6 py-3 md:px-8 md:py-4 rounded-lg md:rounded-xl text-base md:text-lg transition duration-300">
                    <i class="fas fa-phone mr-2 md:mr-3"></i>
                    Call Now: {{ $service->cta_phone ?? '+880(121) 456 77' }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
