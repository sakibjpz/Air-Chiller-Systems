@extends('layouts.frontend')

@section('title', 'About Us | Mohiuddin Engineering Limited')

@section('content')
<!-- ================= HERO SECTION ================= -->
<section class="relative py-16 md:py-24 overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-20"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Engineering <span class="text-yellow-400">Excellence</span> Since 1995
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">
                Pioneering industrial solutions with innovation, integrity, and expertise that drives Bangladesh's engineering landscape forward.
            </p>
            <div class="flex flex-wrap justify-center gap-4 mt-10">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[200px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">25+</div>
                    <div class="text-blue-100">Years Experience</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[200px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">500+</div>
                    <div class="text-blue-100">Projects Completed</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center min-w-[200px]">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">50+</div>
                    <div class="text-blue-100">Expert Engineers</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
            <path fill="#ffffff" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,192C672,181,768,139,864,138.7C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- ================= COMPANY OVERVIEW ================= -->
<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Column - Image -->
            <div class="relative">
                <div class="relative overflow-hidden rounded-3xl shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Mohiuddin Engineering Facility"
                         class="w-full h-[500px] object-cover hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/30 to-transparent rounded-3xl"></div>
                </div>
                
                <!-- Experience Badge -->
                <div class="absolute -bottom-6 -right-6 bg-yellow-500 text-blue-900 p-6 rounded-2xl shadow-2xl">
                    <div class="text-5xl font-bold">25+</div>
                    <div class="text-sm font-semibold">Years of Excellence</div>
                </div>
            </div>
            
            <!-- Right Column - Content -->
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Leading the Future of <span class="text-blue-600">Industrial Engineering</span>
                </h2>
                
                <div class="space-y-6">
                    <p class="text-gray-600 text-lg leading-relaxed">
                        <span class="font-semibold text-blue-700">Mohiuddin Engineering Limited</span> stands as a beacon of innovation and reliability in Bangladesh's engineering sector. Since our inception in 1995, we have been at the forefront of delivering cutting-edge engineering solutions that power industries and transform communities.
                    </p>
                    
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Our commitment extends beyond projects—we build lasting relationships through trust, technical excellence, and unwavering dedication to quality. From conceptualization to execution, every step reflects our passion for engineering perfection.
                    </p>
                    
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-bullseye text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-gray-900 mb-2">Our Philosophy</h4>
                                <p class="text-gray-600">Innovation through engineering excellence, delivered with integrity and sustainable practices.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= VISION & MISSION ================= -->
<section class="py-16 md:py-24 bg-gradient-to-b from-blue-50 to-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Guiding Principles
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                The foundation that drives our engineering excellence
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <!-- Vision Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-500">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-eye text-white text-2xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                    
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        To be the most trusted and innovative engineering solutions provider in Bangladesh, driving industrial growth through sustainable and cutting-edge technologies that transform businesses and communities.
                    </p>
                    
                    <div class="space-y-3">
                        <div class="flex items-center text-blue-600">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>Industry leadership in engineering innovation</span>
                        </div>
                        <div class="flex items-center text-blue-600">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>Sustainable engineering practices</span>
                        </div>
                        <div class="flex items-center text-blue-600">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>National engineering excellence benchmark</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-8 py-4">
                    <div class="text-sm font-semibold text-blue-700">Looking Forward</div>
                </div>
            </div>
            
            <!-- Mission Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-500">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-bullseye text-white text-2xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                    
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        To deliver exceptional engineering solutions through technical expertise, innovative approaches, and unwavering commitment to quality, ensuring client success and contributing to Bangladesh's industrial development.
                    </p>
                    
                    <div class="space-y-3">
                        <div class="flex items-center text-blue-600">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>Client-centric engineering solutions</span>
                        </div>
                        <div class="flex items-center text-blue-600">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>Continuous innovation and improvement</span>
                        </div>
                        <div class="flex items-center text-blue-600">
                            <i class="fas fa-check-circle mr-3"></i>
                            <span>Excellence in execution and delivery</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 px-8 py-4">
                    <div class="text-sm font-semibold text-orange-700">Daily Commitment</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= SCOPE OF WORK ================= -->
<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Scope of Work
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Comprehensive engineering solutions across multiple domains
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Supply -->
            <div class="group">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-1 mb-6">
                    <div class="bg-white rounded-xl p-8 text-center h-full">
                        <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-truck-loading text-blue-600 text-3xl"></i>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Supply</h3>
                        
                        <p class="text-gray-600 mb-6">
                            Comprehensive supply chain solutions for industrial equipment and components
                        </p>
                        
                        <div class="space-y-3 text-left">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">HVAC Systems & Components</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Electrical Panels & Switchgear</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Pumping & Compression Systems</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Industrial Automation Equipment</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Safety & Control Systems</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Application -->
            <div class="group">
                <div class="bg-gradient-to-br from-green-600 to-green-800 rounded-2xl p-1 mb-6">
                    <div class="bg-white rounded-xl p-8 text-center h-full">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-cogs text-green-600 text-3xl"></i>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Application</h3>
                        
                        <p class="text-gray-600 mb-6">
                            Expert engineering application and implementation services
                        </p>
                        
                        <div class="space-y-3 text-left">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">System Design & Engineering</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Installation & Commissioning</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">System Integration</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Performance Optimization</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Technical Consultation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Manufacturing -->
            <div class="group">
                <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl p-1 mb-6">
                    <div class="bg-white rounded-xl p-8 text-center h-full">
                        <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-industry text-purple-600 text-3xl"></i>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Manufacturing</h3>
                        
                        <p class="text-gray-600 mb-6">
                            Precision manufacturing and fabrication services
                        </p>
                        
                        <div class="space-y-3 text-left">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Custom Fabrication</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Assembly & Production</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Quality Control & Testing</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Prototype Development</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Batch Production</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= MODIFICATION SERVICES ================= -->
<section class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Modification & Service Solutions
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Tailored engineering modifications and comprehensive service support
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Modification Services -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-tools text-blue-600"></i>
                        </span>
                        Modification Services
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-redo text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">System Upgrades</h4>
                                <p class="text-gray-600">Modernization of existing systems for enhanced performance and efficiency.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-exchange-alt text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Retrofitting</h4>
                                <p class="text-gray-600">Integration of new technologies into existing industrial setups.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-cube text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Custom Modifications</h4>
                                <p class="text-gray-600">Tailored engineering modifications to meet specific operational requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Service Support -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-headset text-green-600"></i>
                        </span>
                        Service Support
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-check text-yellow-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Preventive Maintenance</h4>
                                <p class="text-gray-600">Regular maintenance schedules to prevent breakdowns and ensure optimal performance.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-ambulance text-red-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Emergency Support</h4>
                                <p class="text-gray-600">24/7 emergency technical support and rapid response teams.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-graduation-cap text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Training & Capacity Building</h4>
                                <p class="text-gray-600">Comprehensive training programs for operational staff and technicians.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CALL TO ACTION ================= -->
<section class="py-16 md:py-24 bg-gradient-to-r from-blue-900 to-blue-800">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Ready to Engineer Your Success?
            </h2>
            <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                Partner with us for engineering solutions that drive results and transform possibilities.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" 
                   class="bg-white text-blue-700 hover:bg-blue-50 font-semibold px-8 py-4 rounded-xl text-lg transition duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-phone-alt mr-3"></i>
                    Contact Our Team
                </a>
                <a href="#" 
                   class="bg-transparent border-2 border-white text-white hover:bg-white/10 font-semibold px-8 py-4 rounded-xl text-lg transition duration-300">
                    <i class="fas fa-cogs mr-3"></i>
                    Explore Our Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection