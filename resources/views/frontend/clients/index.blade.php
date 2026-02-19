@extends('layouts.frontend')

@section('title', 'Our Clients - Mohiuddin Engineering Limited')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                    Our Esteemed Clients
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-6">
                    Building lasting partnerships with industry leaders who trust our engineering excellence
                </p>
                <div class="inline-flex items-center space-x-2 text-blue-200">
                    <i class="fas fa-handshake text-2xl"></i>
                    <span class="font-medium">{{ $clients->count() }}+ Trusted Partners</span>
                </div>
            </div>
        </div>
        
        <!-- Curved bottom -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#f9fafb" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12 md:py-16">
        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center border border-gray-100 hover:border-blue-200 transition">
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ $clients->count() }}</div>
                <div class="text-gray-700 font-medium">Active Clients</div>
                <div class="text-sm text-gray-500 mt-1">Trusted partnerships</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center border border-gray-100 hover:border-blue-200 transition">
                <div class="text-3xl font-bold text-blue-600 mb-2">100%</div>
                <div class="text-gray-700 font-medium">Satisfaction Rate</div>
                <div class="text-sm text-gray-500 mt-1">Client retention</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center border border-gray-100 hover:border-blue-200 transition">
                <div class="text-3xl font-bold text-blue-600 mb-2">25+</div>
                <div class="text-gray-700 font-medium">Years Experience</div>
                <div class="text-sm text-gray-500 mt-1">Serving industries</div>
            </div>
        </div>

        <!-- Clients Grid -->
        <div class="mb-12">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Our Client Portfolio</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We proudly serve a diverse range of clients across multiple industries, 
                    delivering exceptional engineering solutions tailored to their needs.
                </p>
            </div>

          @if($clients->count() > 0)
    <!-- Clients Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($clients as $client)
        <div class="group relative bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 hover:border-blue-200">
            <!-- Logo Container -->
            <div class="h-24 flex items-center justify-center mb-4">
                @if($client->website)
                    <a href="{{ $client->website }}" target="_blank" class="block w-full group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ $client->logo_url }}" 
                             alt="{{ $client->name }} Logo" 
                             class="max-h-20 w-auto mx-auto object-contain filter group-hover:brightness-110 transition duration-300">
                    </a>
                @else
                    <div class="w-full group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ $client->logo_url }}" 
                             alt="{{ $client->name }} Logo" 
                             class="max-h-20 w-auto mx-auto object-contain filter group-hover:brightness-110 transition duration-300">
                    </div>
                @endif
            </div>
            
            <!-- Company Name -->
            <div class="text-center">
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 transition duration-300">
                    {{ $client->name }}
                </h3>
                
                <!-- Website Link -->
                @if($client->website)
                    <a href="{{ $client->website }}" target="_blank" 
                       class="inline-flex items-center text-sm text-blue-500 hover:text-blue-700 mt-2 transition">
                        <span>Visit Website</span>
                        <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                    </a>
                @endif
            </div>

            <!-- Hover Effect Border -->
            <div class="absolute inset-0 rounded-xl border-2 border-transparent group-hover:border-blue-400 transition duration-300 pointer-events-none"></div>
        </div>
        @endforeach
    </div>
@else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-blue-50 mb-6">
                        <i class="fas fa-users text-4xl text-blue-400"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">Client Portfolio</h3>
                    <p class="text-gray-500 max-w-md mx-auto mb-8">
                        Our client portfolio showcases the trusted partnerships we've built over the years.
                        Check back soon to see our growing list of esteemed clients.
                    </p>
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Home
                    </a>
                </div>
            @endif
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 md:p-12 text-center border border-blue-100">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                Want to Join Our Esteemed Client List?
            </h2>
            <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                Partner with us for innovative engineering solutions that drive your business forward.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services.index') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-cogs mr-2"></i>
                    Our Services
                </a>
                <a href="#" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 font-medium rounded-lg border border-blue-200 hover:bg-blue-50 transition duration-300">
                    <i class="fas fa-phone-alt mr-2"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .shadow-hover {
        transition: all 0.3s ease;
    }
    .shadow-hover:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        transform: translateY(-5px);
    }
</style>
@endpush