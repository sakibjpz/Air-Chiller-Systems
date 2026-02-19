@extends('layouts.frontend')

@section('title', 'Retail Store HVAC Solutions - Mohiuddin Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Retail Store Solutions</h1>
            <p class="text-xl text-blue-100">Customer comfort focused HVAC for retail environments</p>
        </div>
    </div>
</section>

<!-- Retail HVAC Challenges -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Retail Store HVAC Challenges</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-door-open text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Frequent Door Opening</h3>
                <p class="text-gray-600">Constant air exchange due to customer traffic affecting temperature control</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-shopping-bag text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Product Preservation</h3>
                <p class="text-gray-600">Specific temperature requirements for different merchandise sections</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-lightbulb text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Lighting Heat Load</h3>
                <p class="text-gray-600">Display lighting generates significant heat requiring additional cooling</p>
            </div>
        </div>
    </div>
</section>

<!-- Retail Store Types -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Retail Store Types We Serve</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tshirt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Apparel Stores</h3>
                <p class="text-gray-600 text-sm">Climate control for fabric preservation</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-utensils text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Supermarkets</h3>
                <p class="text-gray-600 text-sm">Refrigeration and general cooling</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-laptop text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Electronics</h3>
                <p class="text-gray-600 text-sm">Heat management for electronics</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-prescription-bottle text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Pharmacies</h3>
                <p class="text-gray-600 text-sm">Temperature-sensitive medication storage</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Retail Solutions -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Retail HVAC Solutions</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">System Features</h3>
                <div class="space-y-4">
                    <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-blue-500">
                        <h4 class="font-bold text-gray-800 mb-2">Air Curtain Systems</h4>
                        <p class="text-gray-600">Energy-saving air curtains for entrance doors to prevent conditioned air loss</p>
                    </div>
                    
                    <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-green-500">
                        <h4 class="font-bold text-gray-800 mb-2">Demand Control</h4>
                        <p class="text-gray-600">CO₂ sensors adjust ventilation based on customer occupancy</p>
                    </div>
                    
                    <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-purple-500">
                        <h4 class="font-bold text-gray-800 mb-2">Zoned Cooling</h4>
                        <p class="text-gray-600">Separate controls for different store sections (fitting rooms, cashier, storage)</p>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Energy Efficiency</h3>
                <div class="bg-gradient-to-br from-blue-50 to-gray-50 p-6 rounded-xl">
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-sun text-blue-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">Heat Recovery</div>
                                <div class="text-gray-600">Reclaim heat from refrigeration systems</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-blue-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">Smart Scheduling</div>
                                <div class="text-gray-600">Automated operation based on store hours</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-chart-pie text-blue-600"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-800">Energy Monitoring</div>
                                <div class="text-gray-600">Track and optimize energy consumption</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Installation Process -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Quick Installation Process</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                <h3 class="font-bold text-gray-800 mb-2">Assessment</h3>
                <p class="text-gray-600 text-sm">Store layout and requirement analysis</p>
            </div>
            
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                <h3 class="font-bold text-gray-800 mb-2">Design</h3>
                <p class="text-gray-600 text-sm">Custom system design for your store</p>
            </div>
            
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                <h3 class="font-bold text-gray-800 mb-2">Installation</h3>
                <p class="text-gray-600 text-sm">Quick installation with minimal disruption</p>
            </div>
            
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                <h3 class="font-bold text-gray-800 mb-2">Support</h3>
                <p class="text-gray-600 text-sm">24/7 maintenance and support</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Need Retail Store HVAC?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Keep customers comfortable and merchandise protected</p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
            Contact Our Retail Solutions Team
        </a>
    </div>
</section>
@endsection