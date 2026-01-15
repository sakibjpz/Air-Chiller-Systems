@php
$slides = [
    [
        'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
        'title' => 'Professional Engineering Solutions',
        'subtitle' => 'Industrial Excellence Since 1995',
        'description' => 'Providing cutting-edge engineering solutions for industrial and commercial applications with over 25 years of expertise.',
        'buttonText' => 'View Details',
        'buttonLink' => '#',
    ],
    [
        'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
        'title' => 'HVAC & Air Chiller Systems',
        'subtitle' => 'Energy Efficient Solutions',
        'description' => 'State-of-the-art HVAC systems designed for optimal performance and energy efficiency.',
        'buttonText' => 'Our Products',
        'buttonLink' => '#',
    ],
    [
        'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
        'title' => 'Maintenance & Support',
        'subtitle' => '24/7 Technical Support',
        'description' => 'Comprehensive maintenance services ensuring your systems run smoothly all year round.',
        'buttonText' => 'Our Services',
        'buttonLink' => '#',
    ],
];
@endphp

<div x-data="bannerSlider()" 
     x-init="init(true, 4000, {{ count($slides) }})"
     class="banner-slider relative overflow-hidden bg-gray-900"
     @mouseenter="pause()"
     @mouseleave="resume(4000)">
    
    <!-- Slider Container -->
    <div class="relative h-[400px] md:h-[500px] lg:h-[600px]">
        @foreach($slides as $index => $slide)
        <div x-show="currentSlide === {{ $index }}"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-1000"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0"
             x-cloak>
            
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="{{ $slide['image'] }}" 
                     alt="{{ $slide['title'] }}"
                     class="w-full h-full object-cover"
                     loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                     x-ref="slideImage{{ $index }}"
                     @load="imageLoaded({{ $index }})">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-600/50"></div>
            </div>

            <!-- Content -->
            <div class="relative h-full container mx-auto px-4 flex items-center justify-center">
                <div class="max-w-2xl text-white text-center">
                    <!-- Subtitle -->
                    <div class="mb-2 md:mb-3">
                        <span class="inline-block px-3 py-1 bg-blue-600/80 backdrop-blur-sm rounded-full text-sm font-medium">
                            {{ $slide['subtitle'] }}
                        </span>
                    </div>
                    
                    <!-- Main Title -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4 leading-tight">
                        {{ $slide['title'] }}
                    </h1>
                    
                    <!-- Description -->
                   <p class="text-base md:text-lg mb-6 md:mb-8 text-blue-100 max-w-lg mx-auto">
                        {{ $slide['description'] }}
                    </p>
                    
                    <!-- Button -->
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ $slide['buttonLink'] }}"
                           class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300">
                            {{ $slide['buttonText'] }}
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Navigation Dots -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
            @foreach($slides as $index => $slide)
            <button @click="goToSlide({{ $index }})"
                    :class="{ 'bg-white': currentSlide === {{ $index }}, 'bg-white/50': currentSlide !== {{ $index }} }"
                    class="w-2.5 h-2.5 rounded-full transition duration-300">
            </button>
            @endforeach
        </div>

        <!-- Navigation Arrows -->
        <button @click="prevSlide()"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white rounded-full transition duration-300 z-20">
            <i class="fas fa-chevron-left"></i>
        </button>
        
        <button @click="nextSlide()"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white rounded-full transition duration-300 z-20">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>
