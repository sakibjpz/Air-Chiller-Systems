@extends('layouts.frontend')

@section('title', 'Hotel HVAC Solutions - Mohiuddin Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Hotel & Hospitality Solutions</h1>
            <p class="text-xl text-blue-100">Comfort-focused HVAC systems for luxury hotels and resorts</p>
        </div>
    </div>
</section>

<!-- Hotel HVAC Requirements -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Hotel HVAC Requirements</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-bed text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Guest Room Comfort</h3>
                <p class="text-gray-600">Individual temperature control for each room with quiet operation</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-utensils text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Kitchen Ventilation</h3>
                <p class="text-gray-600">Commercial kitchen exhaust and makeup air systems</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-swimming-pool text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Pool & Spa Areas</h3>
                <p class="text-gray-600">Dehumidification and ventilation for wet areas</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Hotel Solutions -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Hotel HVAC Solutions</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Systems We Provide</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>VRF/VRV Systems:</strong> For individual room control and energy efficiency</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt=1 mr-3"></i>
                        <span class="text-gray-700"><strong>Central Plant Systems:</strong> For large hotel complexes</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt=1 mr-3"></i>
                        <span class="text-gray-700"><strong>Banquet Hall Cooling:</strong> High-capacity systems for event spaces</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt=1 mr-3"></i>
                        <span class="text-gray-700"><strong>Kitchen Hood Systems:</strong> Commercial exhaust with fire suppression</span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Our Hotel Projects</h3>
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="font-bold text-gray-800">✓ 5-Star Hotels</div>
                        <div class="text-gray-600">Luxury hospitality projects</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="font-bold text-gray-800">✓ Resort Complexes</div>
                        <div class="text-gray-600">Integrated HVAC solutions</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="font-bold text-gray-800">✓ Boutique Hotels</div>
                        <div class="text-gray-600">Customized comfort systems</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Energy Efficiency -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Energy Efficiency Features</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-r from-blue-50 to-white p-6 rounded-xl">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Heat Recovery Systems</h3>
                <p class="text-gray-600">Recover heat from kitchen exhaust and laundry to preheat fresh air, reducing energy consumption by up to 30%.</p>
            </div>
            
            <div class="bg-gradient-to-r from-blue-50 to-white p-6 rounded-xl">
                <h3 class="text-xl font-bold text-gray-800 mb-4">BMS Integration</h3>
                <p class="text-gray-600">Building Management System integration for centralized control and monitoring of all HVAC equipment.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Planning a Hotel Project?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Get expert HVAC solutions for your hospitality project</p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
            Contact Our Hospitality Solutions Team
        </a>
    </div>
</section>
@endsection