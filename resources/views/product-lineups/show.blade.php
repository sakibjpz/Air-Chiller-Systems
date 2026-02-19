@extends('layouts.frontend')

@section('title', ($productLineup->meta_title ?? $productLineup->title) . ' - Mohiuddin Engineering')

@section('meta_description', $productLineup->meta_description ?? '')
@section('meta_keywords', $productLineup->meta_keywords ?? '')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-teal-900 via-teal-800 to-cyan-700 text-white py-20 md:py-24 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-cyan-400 rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Left Content -->
            <div class="flex-1">
                <!-- Breadcrumb -->
                <div class="flex items-center text-sm text-teal-200 mb-4">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <a href="{{ route('product-lineups.index') }}" class="hover:text-white transition">Products</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span class="text-white">{{ $productLineup->title }}</span>
                </div>
                
                @if($productLineup->subtitle)
                <p class="text-teal-200 text-lg mb-2">{{ $productLineup->subtitle }}</p>
                @endif
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    {{ $productLineup->title }}
                </h1>
                
                <p class="text-xl md:text-2xl text-teal-100 max-w-2xl leading-relaxed mb-8">
                    {{ $productLineup->description }}
                </p>
                
                <!-- Product Tags -->
                <div class="flex flex-wrap gap-4">
                    @if($productLineup->brand)
                    <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-tag mr-2"></i>{{ $productLineup->brand }}
                    </div>
                    @endif
                    @if($productLineup->model_number)
                    <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-hashtag mr-2"></i>{{ $productLineup->model_number }}
                    </div>
                    @endif
                    @if($productLineup->origin)
                    <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-globe mr-2"></i>{{ $productLineup->origin }}
                    </div>
                    @endif
                    @if($productLineup->warranty)
                    <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-shield-alt mr-2"></i>{{ $productLineup->warranty }} Warranty
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Right Image -->
            <div class="flex-1">
                @if($productLineup->image)
                <img src="{{ asset($productLineup->image) }}" 
                     alt="{{ $productLineup->title }}"
                     class="rounded-2xl shadow-2xl border-4 border-white/20 w-full max-w-md mx-auto">
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Product Details Section -->
<section class="py-16 md:py-24">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content - Left Side -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Key Features -->
                @if($productLineup->features && count($productLineup->features) > 0)
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Key Features</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($productLineup->features as $feature)
                        <div class="flex items-start bg-gray-50 p-4 rounded-xl">
                            <div class="flex-shrink-0 w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <p class="text-gray-700">{{ $feature }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Technical Specifications -->
                @if($productLineup->specifications && count($productLineup->specifications) > 0)
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Technical Specifications</h2>
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($productLineup->specifications as $spec)
                            <div class="flex justify-between border-b border-gray-200 pb-2">
                                <span class="font-semibold text-gray-700">{{ $spec['key'] }}:</span>
                                <span class="text-gray-600">{{ $spec['value'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Applications -->
                @if($productLineup->applications && count($productLineup->applications) > 0)
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Applications</h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach($productLineup->applications as $application)
                        <span class="bg-teal-50 text-teal-700 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-check-circle mr-2 text-teal-500"></i>{{ $application }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Technical Details -->
                @if($productLineup->technical_details && count($productLineup->technical_details) > 0)
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Technical Details</h2>
                    <div class="prose max-w-none">
                        @foreach($productLineup->technical_details as $detail)
                        <p class="text-gray-600 mb-3">{{ $detail }}</p>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Gallery -->
                @if($productLineup->gallery_images && count($productLineup->gallery_images) > 0)
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Product Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($productLineup->gallery_images as $image)
                        <div class="cursor-pointer" onclick="openLightbox('{{ asset($image) }}')">
                            <img src="{{ asset($image) }}" 
                                 alt="{{ $productLineup->title }}"
                                 class="w-full h-32 object-cover rounded-lg hover:opacity-75 transition">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar - Right Side -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Quick Quote Card -->
                    <div class="bg-gradient-to-br from-teal-600 to-cyan-600 rounded-2xl p-6 text-white">
                        <h3 class="text-xl font-bold mb-4">Interested in this product?</h3>
                        <p class="text-teal-100 mb-6">Get a quote or more information about {{ $productLineup->title }}</p>
                        <a href="{{ route('contact') }}?product={{ $productLineup->slug }}" 
                           class="block w-full bg-white text-teal-600 font-semibold px-6 py-3 rounded-xl hover:bg-teal-50 transition text-center">
                            <i class="fas fa-phone-alt mr-2"></i>Request Quote
                        </a>
                    </div>

                    <!-- Downloads Card -->
                    @if($productLineup->downloads && count($productLineup->downloads) > 0)
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Downloads</h3>
                        <div class="space-y-3">
                            @foreach($productLineup->downloads as $download)
                            <a href="{{ asset($download['file']) }}" 
                               target="_blank"
                               class="flex items-center p-3 bg-white rounded-xl hover:shadow-md transition">
                                <i class="fas fa-file-pdf text-red-500 text-xl mr-3"></i>
                                <span class="text-gray-700">{{ $download['title'] ?? 'Brochure' }}</span>
                                <i class="fas fa-download ml-auto text-gray-400"></i>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Share Card -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Share this product</h3>
                        <div class="flex space-x-3">
                            <a href="#" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if(isset($relatedProducts) && $relatedProducts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-12 text-center">Related Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $related)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">
                <a href="{{ route('product-lineups.show', $related->slug) }}">
                    @if($related->image)
                    <img src="{{ asset($related->image) }}" 
                         alt="{{ $related->title }}"
                         class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 mb-2">{{ $related->title }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($related->description, 60) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-cyan-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Need Expert Advice?</h2>
        <p class="text-xl mb-10 max-w-2xl mx-auto text-teal-100">
            Our team of engineers is ready to help you choose the right product for your needs
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" 
               class="inline-flex items-center justify-center bg-white text-teal-600 font-semibold px-10 py-4 rounded-xl hover:bg-teal-50 transition transform hover:scale-105 shadow-xl">
                <i class="fas fa-headset mr-3"></i>
                Contact Support
            </a>
            <a href="{{ route('product-lineups.index') }}" 
               class="inline-flex items-center justify-center border-2 border-white text-white font-semibold px-10 py-4 rounded-xl hover:bg-white hover:text-teal-600 transition">
                <i class="fas fa-arrow-left mr-3"></i>
                View All Products
            </a>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightboxModal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center" onclick="closeLightbox(event)">
    <button onclick="closeLightbox(event)" class="absolute top-6 right-6 text-white hover:text-gray-300 text-4xl z-50">&times;</button>
    <div class="relative max-w-5xl max-h-[90vh] mx-4">
        <img id="lightboxImage" src="" alt="" class="max-w-full max-h-[80vh] mx-auto rounded-lg">
    </div>
</div>

<script>
function openLightbox(imageUrl) {
    document.getElementById('lightboxImage').src = imageUrl;
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