@extends('layouts.frontend')

@section('title', 'Residential HVAC Solutions - Mohiuddin Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Residential Solutions</h1>
            <p class="text-xl text-blue-100">Comfort, efficiency, and reliability for homes and apartments</p>
        </div>
    </div>
</section>

<!-- Residential Needs -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Home Comfort Requirements</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">Whole-Home Comfort</h3>
                <p class="text-gray-600 text-sm">Consistent temperature throughout living spaces</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-wind text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">Air Quality</h3>
                <p class="text-gray-600 text-sm">Clean, filtered air for family health</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">Energy Savings</h3>
                <p class="text-gray-600 text-sm">Lower electricity bills with efficient systems</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">Reliability</h3>
                <p class="text-gray-600 text-sm">Dependable systems for year-round comfort</p>
            </div>
        </div>
    </div>
</section>

<!-- Residential Solutions -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Residential HVAC Solutions</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">For Apartments & Condos</h3>
                <div class="space-y-4">
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-building text-blue-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Split AC Systems</h4>
                                <p class="text-gray-600">Individual units for each room with inverter technology</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-tint text-blue-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Ducted Systems</h4>
                                <p class="text-gray-600">Centralized cooling with hidden ductwork for aesthetic appeal</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-filter text-blue-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Air Purification</h4>
                                <p class="text-gray-600">Built-in filters for dust, pollen, and allergen removal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">For Villas & Houses</h3>
                <div class="space-y-4">
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-home text-blue-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Central HVAC Systems</h4>
                                <p class="text-gray-600">Complete home cooling with zoning capabilities</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-solar-panel text-blue-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Hybrid Systems</h4>
                                <p class="text-gray-600">Integration with solar power for energy independence</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-lg shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-mobile-alt text-blue-500 text-xl mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Smart Home Integration</h4>
                                <p class="text-gray-600">Wi-Fi control via smartphone apps</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Energy Efficiency -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Energy Efficient Features</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-b from-blue-50 to-white p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-thermometer-half text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Inverter Technology</h3>
                <p class="text-gray-600">Variable speed compressors that adjust cooling output, saving up to 40% energy</p>
            </div>
            
            <div class="bg-gradient-to-b from-blue-50 to-white p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">5-Star Rated</h3>
                <p class="text-gray-600">Energy Star certified equipment for maximum efficiency and utility rebates</p>
            </div>
            
            <div class="bg-gradient-to-b from-blue-50 to-white p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-sun text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Solar Ready</h3>
                <p class="text-gray-600">Systems designed for easy integration with solar photovoltaic panels</p>
            </div>
        </div>
    </div>
</section>

<!-- Maintenance Services -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Residential Services</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Installation</h3>
                <p class="text-gray-600 text-sm">Professional installation by certified technicians</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Maintenance</h3>
                <p class="text-gray-600 text-sm">Regular servicing for optimal performance</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-wrench"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Repair</h3>
                <p class="text-gray-600 text-sm">24/7 emergency repair services</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Support</h3>
                <p class="text-gray-600 text-sm">Dedicated customer support team</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready for Home Comfort?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Get the perfect HVAC solution for your home</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" 
               class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
                Get Free Consultation
            </a>
            <a href="tel:+8801214567777" 
               class="inline-block bg-transparent border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300">
                <i class="fas fa-phone mr-2"></i> Call Now
            </a>
        </div>
    </div>
</section>
@endsection