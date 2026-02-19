@extends('layouts.frontend')

@section('title', 'Office Building HVAC Solutions - Mohiuddin Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Office Building Solutions</h1>
            <p class="text-xl text-blue-100">Productivity-focused HVAC systems for corporate environments</p>
        </div>
    </div>
</section>

<!-- Office HVAC Requirements -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Modern Office HVAC Needs</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-user-tie text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Employee Productivity</h3>
                <p class="text-gray-600">Optimal temperature and air quality for maximum work efficiency</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-server text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Server Room Cooling</h3>
                <p class="text-gray-600">Precision cooling for IT infrastructure and data centers</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Green Certification</h3>
                <p class="text-gray-600">LEED and green building compliant systems</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Office Solutions -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Office HVAC Solutions</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">System Types</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Variable Air Volume (VAV):</strong> Zone-based control for different office areas</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Dedicated Outdoor Air (DOAS):</strong> For improved indoor air quality</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Chilled Beam Systems:</strong> Energy-efficient radiant cooling</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><strong>Underfloor Air Distribution:</strong> Flexible and efficient cooling</span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Key Features</h3>
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-brain text-blue-600 text-xl mr-3"></i>
                            <div>
                                <div class="font-bold text-gray-800">Smart Controls</div>
                                <div class="text-gray-600">IoT-enabled monitoring and control</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-filter text-blue-600 text-xl mr-3"></i>
                            <div>
                                <div class="font-bold text-gray-800">Air Purification</div>
                                <div class="text-gray-600">HEPA and UV-C filtration systems</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-chart-line text-blue-600 text-xl mr-3"></i>
                            <div>
                                <div class="font-bold text-gray-800">Energy Monitoring</div>
                                <div class="text-gray-600">Real-time energy consumption tracking</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Smart Office Features -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Smart Office Integration</h2>
        
        <div class="bg-gradient-to-r from-blue-50 to-gray-50 p-8 rounded-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Occupancy-Based Control</h3>
                    <p class="text-gray-600 mb-4">Smart sensors adjust temperature and ventilation based on room occupancy, saving energy when spaces are unoccupied.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-motion text-blue-500 mr-2"></i>
                            <span>Motion sensors for occupancy detection</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-blue-500 mr-2"></i>
                            <span>Schedule-based operation</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">BMS Integration</h3>
                    <p class="text-gray-600 mb-4">Seamless integration with Building Management Systems for centralized control of all building services.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-mobile-alt text-blue-500 mr-2"></i>
                            <span>Mobile app control</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chart-bar text-blue-500 mr-2"></i>
                            <span>Analytics and reporting</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Upgrading Your Office HVAC?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-blue-100">Improve productivity with smart office solutions</p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300">
            Contact Our Office Solutions Team
        </a>
    </div>
</section>
@endsection