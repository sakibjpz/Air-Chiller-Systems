@extends('layouts.frontend')

@section('title', 'Contact Us - Mohiuddin Engineering Limited')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-16 md:py-20">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                    Get In Touch
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-6">
                    Have questions about our engineering solutions? We're here to help.
                </p>
                <div class="inline-flex items-center space-x-2 text-blue-200">
                    <i class="fas fa-headset text-2xl"></i>
                    <span class="font-medium">24/7 Technical Support Available</span>
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

    <!-- Contact Section -->
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Send us a Message</h2>
                <p class="text-gray-600 mb-8">Fill out the form below and our team will get back to you shortly.</p>

                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="name" 
                                   name="name"
                                   required
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="Enter your full name">
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address <span class="text-gray-500 text-sm">(Optional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" 
                                   id="email" 
                                   name="email"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="Enter your email address">
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Number *
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone"
                                   required
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="Enter your contact number">
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Your Message <span class="text-gray-500 text-sm">(Optional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                <i class="fas fa-comment text-gray-400 mt-1"></i>
                            </div>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5"
                                      class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                                      placeholder="Write your message here..."></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Contact Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Phone Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white mb-4">
                            <i class="fas fa-phone-alt text-lg"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Call Us</h3>
                        <p class="text-gray-600 mb-2">Available 24/7 for emergencies</p>
                        <a href="tel:+88012145677" class="text-blue-700 font-medium hover:text-blue-800">
                            +880 (121) 456 77
                        </a>
                    </div>

                    <!-- Email Card -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border border-green-200">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-green-600 text-white mb-4">
                            <i class="fas fa-envelope text-lg"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Email Us</h3>
                        <p class="text-gray-600 mb-2">General inquiries & support</p>
                        <a href="mailto:mohiuddinengineering@gmail.com" class="text-green-700 font-medium hover:text-green-800">
                            mohiuddinengineering@gmail.com
                        </a>
                    </div>

                    <!-- Location Card -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 border border-orange-200 md:col-span-2">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-orange-600 text-white mb-4">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Visit Our Office</h3>
                        <p class="text-gray-600 mb-2">Corporate headquarters</p>
                        <p class="text-orange-700 font-medium">
                            123 Engineering Road, Industrial Zone<br>
                            Dhaka, Bangladesh
                        </p>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Business Hours</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium text-gray-900">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-medium text-gray-900">10:00 AM - 4:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-medium text-gray-900">Emergency Only</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-2"></i>
                            For emergency services outside business hours, call our 24/7 support line.
                        </p>
                    </div>
                </div>

                <!-- Quick Contact -->
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 rounded-xl p-6 text-white">
                    <h3 class="text-xl font-semibold mb-4">Need Immediate Assistance?</h3>
                    <p class="text-blue-100 mb-6">Contact our technical support team directly:</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="tel:+8801712345678" 
                           class="inline-flex items-center justify-center px-4 py-2 bg-white text-blue-700 font-medium rounded-lg hover:bg-blue-50 transition">
                            <i class="fas fa-phone mr-2"></i>
                            Call Support
                        </a>
                        <a href="https://wa.me/8801712345678" 
                           target="_blank"
                           class="inline-flex items-center justify-center px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition">
                            <i class="fab fa-whatsapp mr-2"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Map Section -->
    <div class="container mx-auto px-4 pb-16">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Find Us on Map</h3>
                <p class="text-gray-600 mt-1">Visit our headquarters at Mohiuddin Engineering Limited</p>
            </div>
            <div class="h-96">
                <!-- Google Maps Embed -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.023252238437!2d90.3378706!3d23.7361434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf0b0a08ebe5%3A0x35181d7e118a3e81!2sMohiuddin%20Engineering%20Limited!5e0!3m2!1sen!2sbd!4v1705480000000!5m2!1sen!2sbd" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-full">
                </iframe>
            </div>
            <div class="p-6 bg-gray-50 border-t border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">Address</h4>
                        <p class="text-gray-600">
                            Mohiuddin Engineering Limited<br>
                            Plot # 85, Road # 21<br>
                            Nikunja-2, Dhaka 1229<br>
                            Bangladesh
                        </p>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 mb-2">Map Directions</h4>
                        <a href="https://maps.google.com/?q=Mohiuddin+Engineering+Limited,Dhaka" 
                           target="_blank"
                           class="inline-flex items-center text-blue-600 hover:text-blue-800">
                            <i class="fas fa-directions mr-2"></i>
                            Get Directions on Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection