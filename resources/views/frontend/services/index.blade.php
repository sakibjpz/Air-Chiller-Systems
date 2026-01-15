@extends('layouts.frontend')

@section('title', 'Our Services | Mohiuddin Engineering Limited')

@section('content')
<!-- ================= HERO SECTION ================= -->
<section class="relative pt-20 pb-16 md:pt-28 md:pb-24 overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-15"></div>
    
    <div class="container px-4 mx-auto relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 md:mb-6 leading-tight">
                Comprehensive Engineering <span class="text-yellow-400">Services</span>
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-blue-100 mb-6 md:mb-8 leading-relaxed max-w-2xl mx-auto">
                End-to-end engineering solutions designed for performance, efficiency, and reliability
            </p>
            
            <!-- Mobile Stats -->
            <div class="grid grid-cols-2 gap-3 mt-8 md:hidden">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-yellow-400 mb-1">24/7</div>
                    <div class="text-xs text-blue-100">Support</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold text-yellow-400 mb-1">100%</div>
                    <div class="text-xs text-blue-100">Quality</div>
                </div>
            </div>
            
            <!-- Desktop Stats -->
            <div class="hidden md:flex flex-wrap justify-center gap-4 mt-10">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[180px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">24/7</div>
                    <div class="text-blue-100">Technical Support</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[180px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">100%</div>
                    <div class="text-blue-100">Quality Assurance</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[180px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">500+</div>
                    <div class="text-blue-100">Projects</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-12 md:h-20">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,138.7C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- ================= SERVICE INTRO ================= -->
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Complete Engineering <span class="text-blue-600">Solutions</span>
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    From conceptual design to ongoing maintenance, we provide comprehensive engineering services
                </p>
            </div>
            
            <!-- Service Overview Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-12 md:mb-16">
                <div class="bg-blue-50 rounded-xl p-5 md:p-6 text-center">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                        <i class="fas fa-headset text-blue-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">Complete Support</h3>
                    <p class="text-gray-600 text-sm md:text-base">End-to-end technical assistance</p>
                </div>
                
                <div class="bg-green-50 rounded-xl p-5 md:p-6 text-center">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                        <i class="fas fa-building text-green-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">Building Systems</h3>
                    <p class="text-gray-600 text-sm md:text-base">Smart building solutions</p>
                </div>
                
                <div class="bg-purple-50 rounded-xl p-5 md:p-6 text-center">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                        <i class="fas fa-snowflake text-purple-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">Chillers</h3>
                    <p class="text-gray-600 text-sm md:text-base">Cooling system expertise</p>
                </div>
                
                <div class="bg-orange-50 rounded-xl p-5 md:p-6 text-center">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                        <i class="fas fa-industry text-orange-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">Central Plants</h3>
                    <p class="text-gray-600 text-sm md:text-base">District cooling systems</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= COMPLETE SUPPORT & SOLUTIONS ================= -->
<section class="py-12 md:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Complete Support & Solutions
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    24/7 technical support and comprehensive engineering solutions
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                <!-- Mobile Image First -->
                <div class="lg:hidden">
                    <div class="relative overflow-hidden rounded-xl md:rounded-2xl shadow-lg">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Technical Support"
                             class="w-full h-64 sm:h-80 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/40 to-transparent"></div>
                    </div>
                </div>
                
                <!-- Content -->
                <div>
                    <div class="space-y-5 md:space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-blue-100 rounded-lg md:rounded-xl flex items-center justify-center mr-3 md:mr-4">
                                <i class="fas fa-phone-alt text-blue-600 text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-1 md:mb-2">24/7 Technical Support</h3>
                                <p class="text-gray-600 text-sm md:text-base">Round-the-clock technical assistance for all your engineering systems with rapid response teams.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-green-100 rounded-lg md:rounded-xl flex items-center justify-center mr-3 md:mr-4">
                                <i class="fas fa-calendar-check text-green-600 text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-1 md:mb-2">Preventive Maintenance</h3>
                                <p class="text-gray-600 text-sm md:text-base">Scheduled maintenance programs to prevent downtime and extend equipment lifespan.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-purple-100 rounded-lg md:rounded-xl flex items-center justify-center mr-3 md:mr-4">
                                <i class="fas fa-tools text-purple-600 text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-1 md:mb-2">Emergency Repairs</h3>
                                <p class="text-gray-600 text-sm md:text-base">Immediate response and repair services for critical system failures and emergencies.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-orange-100 rounded-lg md:rounded-xl flex items-center justify-center mr-3 md:mr-4">
                                <i class="fas fa-user-graduate text-orange-600 text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-1 md:mb-2">Training Programs</h3>
                                <p class="text-gray-600 text-sm md:text-base">Comprehensive training for your technical staff on system operation and maintenance.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Desktop Image -->
                <div class="hidden lg:block">
                    <div class="relative overflow-hidden rounded-2xl shadow-xl">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Technical Support"
                             class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/40 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= BUILDING SYSTEMS UPGRADES ================= -->
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Building Systems Upgrades
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    Modernization and optimization of building management systems
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                <!-- HVAC System Upgrades -->
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-blue-100 rounded-lg md:rounded-xl flex items-center justify-center mb-3 md:mb-4">
                        <i class="fas fa-wind text-blue-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">HVAC System Upgrades</h3>
                    <p class="text-gray-600 text-sm md:text-base mb-3">Energy-efficient HVAC system modernization for improved performance.</p>
                    <ul class="space-y-1 text-sm">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Energy efficiency optimization
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Smart controls integration
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Retro-commissioning
                        </li>
                    </ul>
                </div>
                
                <!-- Electrical System Modernization -->
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-yellow-100 rounded-lg md:rounded-xl flex items-center justify-center mb-3 md:mb-4">
                        <i class="fas fa-bolt text-yellow-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">Electrical System Modernization</h3>
                    <p class="text-gray-600 text-sm md:text-base mb-3">Upgrade of electrical systems for safety and efficiency.</p>
                    <ul class="space-y-1 text-sm">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Panel upgrades
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Energy management systems
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Lighting retrofits
                        </li>
                    </ul>
                </div>
                
                <!-- Building Automation -->
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-green-100 rounded-lg md:rounded-xl flex items-center justify-center mb-3 md:mb-4">
                        <i class="fas fa-robot text-green-600 text-lg md:text-xl"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">Building Automation</h3>
                    <p class="text-gray-600 text-sm md:text-base mb-3">Integration of smart building automation systems.</p>
                    <ul class="space-y-1 text-sm">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            BMS integration
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            IoT sensor networks
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2 text-xs"></i>
                            Remote monitoring
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CHILLERS SECTION ================= -->
<section class="py-12 md:py-20 bg-gradient-to-b from-blue-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Chillers & Cooling Solutions
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    Advanced chilling systems for industrial and commercial applications
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                <!-- Centrifugal Chillers -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden">
                    <div class="relative h-48 md:h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Centrifugal Chillers"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-white text-blue-700 font-semibold px-3 py-1 rounded-full text-sm">
                                Industrial Grade
                            </span>
                        </div>
                    </div>
                    <div class="p-5 md:p-6">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Centrifugal Chillers</h3>
                        <p class="text-gray-600 text-sm md:text-base mb-4">High-capacity centrifugal chillers for large-scale industrial applications.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">500-2000 TR</span>
                            <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">Energy Efficient</span>
                            <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">Low Maintenance</span>
                        </div>
                    </div>
                </div>
                
                <!-- Screw Chillers -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg overflow-hidden">
                    <div class="relative h-48 md:h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Screw Chillers"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-white text-green-700 font-semibold px-3 py-1 rounded-full text-sm">
                                Commercial Grade
                            </span>
                        </div>
                    </div>
                    <div class="p-5 md:p-6">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Screw Chillers</h3>
                        <p class="text-gray-600 text-sm md:text-base mb-4">Reliable screw chillers for commercial and medium-scale applications.</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">100-500 TR</span>
                            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Compact Design</span>
                            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Quiet Operation</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Chiller Types -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5 mt-8 md:mt-10">
                <div class="bg-white rounded-lg md:rounded-xl p-4 md:p-5 text-center border border-gray-200">
                    <i class="fas fa-water text-blue-500 text-lg md:text-xl mb-2"></i>
                    <h4 class="font-semibold text-gray-900 text-sm md:text-base">Water-Cooled</h4>
                    <p class="text-gray-600 text-xs md:text-sm mt-1">High efficiency systems</p>
                </div>
                
                <div class="bg-white rounded-lg md:rounded-xl p-4 md:p-5 text-center border border-gray-200">
                    <i class="fas fa-fan text-green-500 text-lg md:text-xl mb-2"></i>
                    <h4 class="font-semibold text-gray-900 text-sm md:text-base">Air-Cooled</h4>
                    <p class="text-gray-600 text-xs md:text-sm mt-1">Easy installation</p>
                </div>
                
                <div class="bg-white rounded-lg md:rounded-xl p-4 md:p-5 text-center border border-gray-200">
                    <i class="fas fa-recycle text-purple-500 text-lg md:text-xl mb-2"></i>
                    <h4 class="font-semibold text-gray-900 text-sm md:text-base">Absorption</h4>
                    <p class="text-gray-600 text-xs md:text-sm mt-1">Waste heat recovery</p>
                </div>
                
                <div class="bg-white rounded-lg md:rounded-xl p-4 md:p-5 text-center border border-gray-200">
                    <i class="fas fa-leaf text-orange-500 text-lg md:text-xl mb-2"></i>
                    <h4 class="font-semibold text-gray-900 text-sm md:text-base">Eco-Friendly</h4>
                    <p class="text-gray-600 text-xs md:text-sm mt-1">Green cooling solutions</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CENTRAL PLANT & DISTRICT COOLING ================= -->
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-10 md:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Central Plant & District Cooling
                </h2>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                    Large-scale cooling solutions for cities, campuses, and industrial complexes
                </p>
            </div>
            
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 rounded-xl md:rounded-2xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Content -->
                    <div class="p-6 md:p-8 lg:p-10 text-white">
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 md:mb-4">District Cooling Systems</h3>
                        <p class="text-blue-100 text-sm md:text-base mb-5 md:mb-6">
                            Centralized cooling plants that serve multiple buildings through a network of underground pipes, offering energy efficiency and cost savings.
                        </p>
                        
                        <div class="space-y-4 md:space-y-5">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-yellow-400 mt-1 mr-3 text-sm md:text-base"></i>
                                <div>
                                    <h4 class="font-semibold text-sm md:text-base">Energy Efficiency</h4>
                                    <p class="text-blue-200 text-xs md:text-sm">Up to 40% energy savings compared to individual systems</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-yellow-400 mt-1 mr-3 text-sm md:text-base"></i>
                                <div>
                                    <h4 class="font-semibold text-sm md:text-base">Cost Effective</h4>
                                    <p class="text-blue-200 text-xs md:text-sm">Reduced capital and operational costs</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-yellow-400 mt-1 mr-3 text-sm md:text-base"></i>
                                <div>
                                    <h4 class="font-semibold text-sm md:text-base">Reliability</h4>
                                    <p class="text-blue-200 text-xs md:text-sm">High reliability with backup systems</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-yellow-400 mt-1 mr-3 text-sm md:text-base"></i>
                                <div>
                                    <h4 class="font-semibold text-sm md:text-base">Scalability</h4>
                                    <p class="text-blue-200 text-xs md:text-sm">Easy expansion as demand grows</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image/Diagram -->
                    <div class="relative min-h-[300px] md:min-h-[400px]">
                        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')] bg-cover bg-center"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-transparent lg:bg-gradient-to-l"></div>
                        
                        <!-- Overlay Content -->
                        <div class="relative h-full flex items-center justify-center p-6">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 md:p-6 text-white text-center max-w-xs">
                                <div class="text-3xl md:text-4xl font-bold mb-2">40%</div>
                                <div class="text-sm md:text-base">Energy Savings</div>
                                <div class="text-xs md:text-sm text-blue-200 mt-2">Compared to traditional systems</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Central Plant Services -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-6 mt-8 md:mt-10">
                <div class="bg-gray-50 rounded-xl p-5 md:p-6">
                    <h4 class="font-semibold text-gray-900 text-lg md:text-xl mb-2">Plant Design</h4>
                    <p class="text-gray-600 text-sm md:text-base">Complete engineering design for central cooling plants</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-5 md:p-6">
                    <h4 class="font-semibold text-gray-900 text-lg md:text-xl mb-2">Installation</h4>
                    <p class="text-gray-600 text-sm md:text-base">Turnkey installation of district cooling systems</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-5 md:p-6">
                    <h4 class="font-semibold text-gray-900 text-lg md:text-xl mb-2">Operation & Maintenance</h4>
                    <p class="text-gray-600 text-sm md:text-base">24/7 plant operation and maintenance services</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="py-12 md:py-20 bg-gradient-to-r from-blue-900 to-blue-800">
    <div class="container px-4 mx-auto">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 md:mb-6">
                Need Engineering Solutions?
            </h2>
            <p class="text-lg sm:text-xl text-blue-100 mb-6 md:mb-8 max-w-2xl mx-auto">
                Contact us for customized engineering services tailored to your needs
            </p>
            
            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
                <a href="" 
                   class="bg-white text-blue-700 hover:bg-blue-50 font-semibold px-6 py-3 md:px-8 md:py-4 rounded-lg md:rounded-xl text-base md:text-lg transition duration-300 shadow-lg">
                    <i class="fas fa-phone-alt mr-2 md:mr-3"></i>
                    Get a Quote
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