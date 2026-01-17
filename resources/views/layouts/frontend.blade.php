
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mohiuddin Engineering Limited')</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Vite CSS - Tailwind + Custom -->
    @vite(['resources/css/app.css', 'resources/css/header.css'])
    
    @stack('styles')
    
    <style>
    [x-cloak] {
        display: none !important;
    }
    
    .banner-slider {
        margin-top: -1px;
    }
    </style>
</head>
<body class="bg-gray-50">

<!-- ================= STICKY HEADER WRAPPER ================= -->
<div class="sticky-header-wrapper">
    <!-- ================= TOP HEADER ================= -->
    <div class="header-top bg-gray-100 text-blue-600 text-sm py-2 hidden md:block">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="top-left flex space-x-4">
                <span class="flex items-center">
                    <i class="fas fa-phone-alt mr-2"></i>
                    Call No: +880(121) 456 77
                </span>
                <span class="flex items-center">
                    <i class="fas fa-envelope mr-2"></i>
                    Email: mohiuddinrengineering@gmail.com
                </span>
            </div>
            <div class="top-right flex items-center">
                <span class="mr-4 hidden lg:inline">Follow us:</span>
                <div class="social-icons flex space-x-3">
                    <a href="https://facebook.com" target="_blank" class="hover:text-blue-800 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="hover:text-blue-800 transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="hover:text-blue-800 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= MAIN HEADER ================= -->
    <header class="main-header bg-white shadow-sm py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                
                <!-- Mobile Hamburger -->
                <button class="hamburger md:hidden text-blue-600 text-2xl" type="button" id="mobileMenuToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Logo -->
                <a href="{{ url('/') }}" class="logo">
   <img src="{{ asset('assets/images/logo.png') }}" 
         alt="Mohiuddin Engineering Limited Logo"
         class="h-16 w-auto">
</a>

               <!-- Desktop Navigation -->
<nav class="desktop-nav hidden md:block flex-grow mx-4">
    <ul class="nav-menu flex justify-center space-x-1">
        <li>
            <a href="{{ url('/') }}" class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('about') }}" class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium">
                About us
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}" class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium">
                Products
            </a>
        </li>
        <li>
            <a href="{{ route('services') }}" class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium">
                Services
            </a>
        </li>
        <li>
            <a href="{{ route('clients') }}" class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium">
                Clients
            </a>
        </li>
        <!-- Pages Dropdown (Only News for now) -->
        <li class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
            <button class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium flex items-center">
                Pages
                <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
            </button>
            
            <!-- Dropdown Menu -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-1"
                 class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 z-50"
                 style="display: none;"
                 @click.away="open = false">
                <div class="py-2">
                    <!-- News & Blogs -->
                    <a href="{{ route('news.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition group">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200 transition">
                            <i class="fas fa-newspaper text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <div class="font-medium">News & Blogs</div>
                            <div class="text-xs text-gray-500">Latest updates</div>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li>
            <a href="{{ route('contact') }}" class="text-blue-800 hover:bg-blue-50 px-4 py-3 inline-block transition font-medium">
                Contact us
            </a>
        </li>
    </ul>
</nav>
                <!-- Desktop Search -->
                <div class="search-box hidden md:flex">
                    <div class="flex">
                        <input type="text" placeholder="Search..." 
                               class="px-3 py-2 border border-r-0 border-blue-500 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                        <button type="button" class="bg-blue-700 text-white px-4 rounded-r-lg hover:bg-blue-800 transition">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </header>
</div> <!-- This closes sticky-header-wrapper -->

<!-- ================= MOBILE MENU ================= -->
<div class="mobile-menu hidden fixed inset-0 bg-gray-800 bg-opacity-50 z-50" id="mobileMenu">
    <div class="absolute right-0 top-0 h-full w-64 bg-white shadow-lg">
        <div class="p-4">
            <!-- Mobile Menu Header -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-blue-800">Menu</h3>
                <button type="button" class="text-gray-500 text-2xl" id="closeMobileMenu">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Mobile Search -->
            <div class="mb-6">
                <div class="flex">
                    <input type="text" placeholder="Search..." 
                           class="flex-grow px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button" class="bg-blue-600 text-white px-4 rounded-r-lg">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

         <!-- Mobile Navigation -->
<ul class="mobile-nav space-y-2">
    <li>
        <a href="{{ url('/') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
            <i class="fas fa-home mr-3"></i>Home
        </a>
    </li>
    <li>
        <a href="{{ route('about') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
            <i class="fas fa-info-circle mr-3"></i>About us
        </a>
    </li>
    <li>
        <a href="{{ route('products.index') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
            <i class="fas fa-box mr-3"></i>Products
        </a>
    </li>
    <li>
        <a href="{{ route('services') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
            <i class="fas fa-cogs mr-3"></i>Services
        </a>
    </li>
    <li>
        <a href="{{ route('clients') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
            <i class="fas fa-users mr-3"></i>Clients
        </a>
    </li>
    
    <!-- Pages Dropdown (Mobile) -->
    <li class="mobile-dropdown">
        <div class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 rounded-lg transition cursor-pointer" onclick="toggleMobileDropdown(this)">
            <div class="flex items-center">
                <i class="fas fa-file-alt mr-3"></i>
                <span>Pages</span>
            </div>
            <i class="fas fa-chevron-down transition-transform"></i>
        </div>
        <div class="mobile-dropdown-content hidden pl-6 mt-2 space-y-2">
            <a href="{{ route('news.index') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
                <i class="fas fa-newspaper mr-3"></i>News & Blogs
            </a>
        </div>
    </li>
    
    <li>
        <a href="{{ route('contact') }}" class="block py-2 px-3 hover:bg-gray-100 rounded-lg transition">
            <i class="fas fa-phone-alt mr-3"></i>Contact us
        </a>
    </li>
</ul>
            <!-- Mobile Social Icons -->
            <div class="mobile-social mt-8 pt-6 border-t border-gray-200">
                <p class="text-gray-600 mb-3">Follow us:</p>
                <div class="flex space-x-4">
                    <a href="https://facebook.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-xl">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-xl">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



  <!-- ================= BANNER SLIDER ================= -->
{{-- @php
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
</div>   --}}


<!-- Main Content -->
<main class="min-h-screen">
    @yield('content')
</main>

<!-- Include Footer -->
@include('partials.footer')

<!-- JavaScript -->
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('bannerSlider', () => ({
        currentSlide: 0,
        isPlaying: true,
        totalSlides: 0,
        intervalId: null,
        loadedImages: [],
        
        init(autoplay, interval, total) {
            this.totalSlides = total;
            this.loadedImages = new Array(total).fill(false);
            
            // Force show first slide on init
            this.currentSlide = 0;
            
            // Small delay to ensure DOM is ready
            this.$nextTick(() => {
                // Show first slide
                this.showCurrentSlide();
                
                if (autoplay) {
                    this.startAutoplay(interval);
                }
            });
            
            // Pause autoplay when tab is not visible
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.pause();
                } else if (this.isPlaying) {
                    this.resume(interval);
                }
            });
        },
        
        showCurrentSlide() {
            // This ensures the current slide is visible
            const slides = this.$el.querySelectorAll('[x-show]');
            slides.forEach((slide, index) => {
                if (index === this.currentSlide) {
                    slide.style.display = 'block';
                }
            });
        },
        
        startAutoplay(interval) {
            this.intervalId = setInterval(() => {
                this.nextSlide();
            }, interval);
            this.isPlaying = true;
        },
        
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            this.showCurrentSlide();
        },
        
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            this.showCurrentSlide();
        },
        
        goToSlide(index) {
            this.currentSlide = index;
            this.showCurrentSlide();
        },
        
        pause() {
            if (this.intervalId) {
                clearInterval(this.intervalId);
                this.intervalId = null;
                this.isPlaying = false;
            }
        },
        
        resume(interval) {
            if (!this.intervalId) {
                this.startAutoplay(interval);
            }
        },
        
        imageLoaded(index) {
            this.loadedImages[index] = true;
        }
    }));
});

// Mobile Menu JavaScript
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const closeMobileMenu = document.getElementById('closeMobileMenu');

if (mobileMenuToggle && mobileMenu && closeMobileMenu) {
    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });
    
    closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
    
    mobileMenu.addEventListener('click', (e) => {
        if (e.target === mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    });
}

// Mobile dropdown functionality
function toggleMobileDropdown(element) {
    const dropdownContent = element.nextElementSibling;
    const chevron = element.querySelector('.fa-chevron-down');
    
    dropdownContent.classList.toggle('hidden');
    chevron.classList.toggle('rotate-180');
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.mobile-dropdown')) {
        document.querySelectorAll('.mobile-dropdown-content').forEach(function(dropdown) {
            dropdown.classList.add('hidden');
        });
        document.querySelectorAll('.mobile-dropdown .fa-chevron-down').forEach(function(chevron) {
            chevron.classList.remove('rotate-180');
        });
    }
});
</script>

@stack('scripts')
</body>
</html>
