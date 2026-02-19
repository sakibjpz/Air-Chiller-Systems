@extends('layouts.frontend')

@section('title', 'Our Services - Mohiuddin Engineering')

@section('content')
<!-- ================= HERO SECTION ================= -->
<section class="relative pt-20 pb-16 md:pt-28 md:pb-24 overflow-hidden bg-gradient-to-br from-teal-900 via-teal-800 to-cyan-700">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-15"></div>
    
    <div class="container px-4 mx-auto relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 md:mb-6 leading-tight">
                Our <span class="text-yellow-400">Services</span>
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-teal-100 mb-6 md:mb-8 leading-relaxed max-w-2xl mx-auto">
                Comprehensive engineering solutions designed for performance, efficiency, and reliability
            </p>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-12 md:h-20">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,138.7C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- ================= SERVICES GRID ================= -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    What We Offer
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    Explore our comprehensive range of engineering services
                </p>
            </div>
            
            @if($services && count($services) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($services as $service)
                <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100">
                    <a href="{{ route('services.show', $service->slug) }}" class="block">
                        <div class="relative h-56 overflow-hidden">
                            @if($service->image)
                            <img src="{{ asset($service->image) }}" 
                                 alt="{{ $service->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-teal-500 to-cyan-500 flex items-center justify-center">
                                <i class="{{ $service->icon ?? 'fas fa-cogs' }} text-white text-5xl"></i>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-teal-600 transition-colors duration-300">
                                {{ $service->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {{ Str::limit($service->description, 100) }}
                            </p>
                            <span class="inline-flex items-center text-teal-600 font-semibold">
                                Learn More
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500">No services available at the moment.</p>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="py-16 md:py-20 bg-gradient-to-r from-teal-900 to-teal-800">
    <div class="container px-4 mx-auto">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 md:mb-6">
                Need Custom Engineering Solutions?
            </h2>
            <p class="text-lg sm:text-xl text-teal-100 mb-6 md:mb-8 max-w-2xl mx-auto">
                Contact our team to discuss your specific requirements
            </p>
            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
                <a href="{{ route('contact') }}" 
                   class="bg-white text-teal-700 hover:bg-teal-50 font-semibold px-6 py-3 md:px-8 md:py-4 rounded-lg md:rounded-xl text-base md:text-lg transition duration-300 shadow-lg">
                    <i class="fas fa-phone-alt mr-2 md:mr-3"></i>
                    Contact Us
                </a>
                <a href="tel:+88012145677" 
                   class="bg-transparent border-2 border-white text-white hover:bg-white/10 font-semibold px-6 py-3 md:px-8 md:py-4 rounded-lg md:rounded-xl text-base md:text-lg transition duration-300">
                    <i class="fas fa-phone mr-2 md:mr-3"></i>
                    Call Now: +880(121) 456 77
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
