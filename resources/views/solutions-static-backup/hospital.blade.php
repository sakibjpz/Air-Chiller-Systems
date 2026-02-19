@extends('layouts.frontend')

@section('title', 'Hospital HVAC Solutions - Mohiuddin Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Hospital & Healthcare Solutions</h1>
            <p class="text-xl text-blue-100">Specialized HVAC systems for healthcare facilities ensuring patient safety and comfort</p>
        </div>
    </div>
</section>

<!-- Why Hospitals Need Special HVAC -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Hospitals Need Specialized HVAC Systems</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Infection Control</h3>
                <p class="text-gray-600">Precise air filtration and pressure control to prevent cross-contamination</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-temperature-low text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Temperature Control</h3>
                <p class="text-gray-600">Critical areas like OTs, ICUs require specific temperature ranges</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-wind text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Air Quality</h3>
                <p class="text-gray-600">HEPA filters and UVGI systems for sterile environments</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Hospital Solutions -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Hospital HVAC Solutions</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Equipment We Provide</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Medical Grade Chillers:</strong> For MRI machines, lab equipment cooling</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Operating Theater AHUs:</strong> With HEPA filtration and pressure control</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Isolation Room Systems:</strong> Negative/positive pressure systems</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Central Cooling Plants:</strong> For entire hospital complexes</span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Our Expertise</h3>
                <p class="text-gray-600 mb-4">With 30+ years experience, we've served:</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="text-blue-600 font-bold text-2xl">50+</div>
                        <div class="text-gray-600">Hospitals Served</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="text-blue-600 font-bold text-2xl">24/7</div>
                        <div class="text-gray-600">Support Service</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Need Hospital HVAC Solutions?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Contact us for a customized solution for your healthcare facility</p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
            Contact Our Hospital Solutions Team
        </a>
    </div>
</section>
@endsection