@extends('layouts.frontend')

@section('title', 'Home | Mohiuddin Engineering Limited')

@section('content')
<!-- Banner Slider -->
@include('partials.banner-slider')

<div class="container mx-auto px-4 py-8">
    <!-- Welcome Section -->
    <section class="mb-12 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-800 mb-4">
            Welcome to Mohiuddin Engineering Limited
        </h2>
        <p class="text-gray-600 max-w-3xl mx-auto text-sm sm:text-base">
            We are a leading engineering solutions provider with decades of experience in industrial and commercial projects.
        </p>
    </section>

    <!-- Include Product Groups Partial -->
    @include('partials.product-groups')

    <!-- Core Values Section -->
    @include('partials.core-values')

        <!-- Solutions Section -->
    @include('partials.solutions')

    <!-- Other Products Section -->
@include('partials.product-lineups')

<!-- Certifications Section -->
@include('partials.certifications')

<!-- Latest Gallery Section -->
@include('partials.gallery')

    

    <!-- Call to Action -->
    <section class="bg-blue-50 rounded-2xl p-6 sm:p-8 mb-12">
        <div class="text-center">
            <h3 class="text-xl sm:text-2xl font-bold text-blue-800 mb-4">Need Custom Engineering Solutions?</h3>
            <p class="text-gray-600 mb-6 max-w-2xl mx-auto text-sm sm:text-base">
                Contact us for tailored engineering solutions for your specific requirements.
            </p>
            <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 text-sm sm:text-base">
                <i class="fas fa-phone-alt mr-2"></i>
                Get a Quote
            </a>
        </div>
    </section>
</div>
@endsection