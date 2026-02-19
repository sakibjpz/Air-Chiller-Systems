@extends('layouts.frontend')

@section('title', ($solution->meta_title ?? $solution->title) . ' - Mohiuddin Engineering')

@section('meta_description', $solution->meta_description ?? '')
@section('meta_keywords', $solution->meta_keywords ?? '')

@section('content')
<!-- Hero Section with Enhanced Design -->
<section class="relative bg-gradient-to-r from-teal-900 via-teal-800 to-cyan-700 text-white py-20 md:py-24 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-cyan-400 rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl">
            <!-- Breadcrumb -->
            <div class="flex items-center text-sm text-teal-200 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                <a href="{{ route('solutions.index') }}" class="hover:text-white transition">Solutions</a>
                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                <span class="text-white">{{ $solution->title }}</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                {{ $solution->title }}
            </h1>
            <p class="text-xl md:text-2xl text-teal-100 max-w-3xl leading-relaxed">
                {{ $solution->description }}
            </p>
            
            <!-- Stats Bar -->
            @if($solution->statistics)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                @foreach($solution->statistics as $stat)
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-white">{{ $stat['value'] }}</div>
                    <div class="text-sm text-teal-200 mt-1">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Why Section with Dynamic Features -->
@if($solution->features)
<section class="py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $solution->why_heading ?? 'Why Choose Our ' . $solution->title . ' Solutions' }}
            </h2>
            @if($solution->why_description)
            <p class="text-xl text-gray-600">{{ $solution->why_description }}</p>
            @endif
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($solution->features as $feature)
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-cyan-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="{{ $feature['icon'] ?? 'fas fa-shield-alt' }} text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $feature['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Equipment Section -->
@if($solution->equipment)
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ $solution->equipment_heading ?? 'Equipment We Provide' }}
                </h2>
                <div class="space-y-4">
                    @foreach($solution->equipment as $item)
                    <div class="flex items-start group hover:bg-white p-4 rounded-xl transition-all duration-300">
                        <div class="flex-shrink-0 w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $item }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-teal-100 rounded-full blur-3xl opacity-50"></div>
                <div class="relative bg-gradient-to-br from-teal-600 to-cyan-600 rounded-3xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-6">Quick Quote</h3>
                    <p class="mb-6 text-teal-100">Get a customized solution for your facility</p>
                    <a href="{{ route('contact') }}" 
                       class="inline-block bg-white text-teal-600 font-semibold px-8 py-4 rounded-xl hover:bg-teal-50 transition-all duration-300 w-full text-center">
                        Contact Us Today
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Gallery Section with Lightbox -->
@if($solution->activeGalleries->count() > 0)
<section class="py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Projects</h2>
            <p class="text-xl text-gray-600">Take a look at some of our completed {{ $solution->title }} projects</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($solution->activeGalleries as $gallery)
            <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer" onclick="openLightbox('{{ asset($gallery->image) }}', '{{ $gallery->title ?? '' }}', '{{ $gallery->description ?? '' }}')">
                <img src="{{ asset($gallery->image) }}" 
                     alt="{{ $gallery->title ?? $solution->title . ' Project' }}"
                     class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        @if($gallery->title)
                            <h3 class="text-xl font-bold mb-2">{{ $gallery->title }}</h3>
                        @endif
                        @if($gallery->description)
                            <p class="text-sm text-gray-200">{{ Str::limit($gallery->description, 80) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section with Enhanced Design -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-cyan-600 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-teal-400/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Get Started?</h2>
        <p class="text-xl mb-10 max-w-2xl mx-auto text-teal-100">
            Let's discuss your {{ $solution->title }} requirements and find the perfect solution for your facility
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" 
               class="inline-flex items-center justify-center bg-white text-teal-600 font-semibold px-10 py-4 rounded-xl hover:bg-teal-50 transition-all duration-300 transform hover:scale-105 shadow-xl">
                <i class="fas fa-phone-alt mr-3"></i>
                Contact Our Team
            </a>
            <a href="{{ route('solutions.index') }}" 
               class="inline-flex items-center justify-center border-2 border-white text-white font-semibold px-10 py-4 rounded-xl hover:bg-white hover:text-teal-600 transition-all duration-300">
                <i class="fas fa-arrow-left mr-3"></i>
                View All Solutions
            </a>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightboxModal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center" onclick="closeLightbox(event)">
    <button onclick="closeLightbox(event)" class="absolute top-6 right-6 text-white hover:text-gray-300 text-4xl z-50">&times;</button>
    <div class="relative max-w-5xl max-h-[90vh] mx-4">
        <img id="lightboxImage" src="" alt="" class="max-w-full max-h-[80vh] mx-auto rounded-lg">
        <div id="lightboxCaption" class="text-white text-center mt-4 text-lg"></div>
    </div>
</div>

<script>
function openLightbox(imageUrl, title, description) {
    document.getElementById('lightboxImage').src = imageUrl;
    let caption = '';
    if (title) caption += '<strong>' + title + '</strong>';
    if (description) {
        if (title) caption += '<br>';
        caption += description;
    }
    document.getElementById('lightboxCaption').innerHTML = caption;
    document.getElementById('lightboxModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox(event) {
    if (event.target === document.getElementById('lightboxModal') || event.target.closest('button')) {
        document.getElementById('lightboxModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Close on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.getElementById('lightboxModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});
</script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

#lightboxModal {
    animation: fadeIn 0.3s ease-out;
}
</style>
@endsection