@extends('layouts.frontend')

@section('title', 'Shopping Mall HVAC Solutions - Mohiuddin Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Shopping Mall & Retail Solutions</h1>
            <p class="text-xl text-blue-100">Energy-efficient HVAC systems for commercial complexes and shopping centers</p>
        </div>
    </div>
</section>

<!-- Why Shopping Malls Need Special HVAC -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">HVAC Challenges in Shopping Malls</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">High Occupancy</h3>
                <p class="text-gray-600">Managing large crowds with varying heat loads and air quality needs</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-store text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Multiple Zones</h3>
                <p class="text-gray-600">Different areas (food courts, cinemas, stores) require separate climate control</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-bolt text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Energy Efficiency</h3>
                <p class="text-gray-600">24/7 operation demands optimized energy consumption for cost savings</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Shopping Mall Solutions -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Shopping Mall HVAC Solutions</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Specialized Systems</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Central Chiller Plants:</strong> High-capacity systems for large complexes</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>VAV Systems:</strong> Variable Air Volume for different store requirements</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Food Court Exhaust:</strong> Specialized kitchen ventilation systems</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Cinema Hall Cooling:</strong> High-capacity systems for auditoriums</span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Key Benefits</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-percentage text-blue-600 text-xl mr-3"></i>
                            <div>
                                <div class="font-bold text-gray-800">Up to 40% Energy Savings</div>
                                <div class="text-gray-600">With smart HVAC controls</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-shield-alt text-blue-600 text-xl mr-3"></i>
                            <div>
                                <div class="font-bold text-gray-800">24/7 Monitoring</div>
                                <div class="text-gray-600">Remote monitoring and maintenance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Need Shopping Mall HVAC Solutions?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Design efficient systems for your commercial complex</p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
            Contact Our Commercial Solutions Team
        </a>
    </div>
</section>
@endsection