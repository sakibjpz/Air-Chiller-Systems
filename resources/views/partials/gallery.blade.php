@if($galleries && count($galleries) > 0)
<!-- ================= LATEST GALLERY ================= -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Latest Gallery
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Explore our projects, office, and events
            </p>
        </div>

        <!-- Category Filters (if categories exist) -->
        @php
            $categories = $galleries->pluck('category')->filter()->unique()->values();
        @endphp
        
        @if($categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-3 mb-8">
            <button data-filter="all" class="category-filter px-5 py-2 bg-blue-600 text-white font-semibold rounded-full transition duration-300">
                All
            </button>
            @foreach($categories as $category)
            <button data-filter="{{ Str::slug($category) }}" class="category-filter px-5 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium rounded-full transition duration-300">
                {{ $category }}
            </button>
            @endforeach
        </div>
        @endif

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach($galleries as $gallery)
            <div class="gallery-item group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 {{ $gallery->category ? 'category-' . Str::slug($gallery->category) : '' }}"
                 data-category="{{ $gallery->category ? Str::slug($gallery->category) : 'uncategorized' }}"
                 data-index="{{ $loop->index }}">
                
                <!-- Image -->
                <div class="relative aspect-square overflow-hidden">
                    <img src="{{ asset($gallery->image) }}" 
                         alt="{{ $gallery->title ?: 'Gallery Image' }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            @if($gallery->title)
                            <h3 class="font-bold text-lg mb-1">{{ $gallery->title }}</h3>
                            @endif
                            @if($gallery->category)
                            <span class="inline-block px-2 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs">
                                {{ $gallery->category }}
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- View Icon -->
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <i class="fas fa-expand text-blue-600"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View More Button (if many images) -->
        @if(count($galleries) > 12)
        <div class="text-center mt-10">
            <button id="loadMoreGallery" class="px-6 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold rounded-lg transition-all duration-300">
                Load More
                <i class="fas fa-chevron-down ml-2"></i>
            </button>
        </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal -->
<div id="galleryLightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
    <div class="relative w-full max-w-6xl max-h-[90vh]">
        <!-- Close Button -->
        <button id="closeLightbox" class="absolute -top-12 right-0 text-white text-3xl hover:text-gray-300 z-10">
            <i class="fas fa-times"></i>
        </button>
        
        <!-- Navigation Buttons -->
        <button id="prevImage" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/20 transition duration-300 z-10">
            <i class="fas fa-chevron-left"></i>
        </button>
        
        <button id="nextImage" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/20 transition duration-300 z-10">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <!-- Lightbox Content -->
        <div class="relative h-full">
            <!-- Image -->
            <img id="lightboxImage" class="w-full h-full object-contain rounded-lg">
            
            <!-- Caption -->
            <div id="lightboxCaption" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 text-white rounded-b-lg">
                <h3 id="lightboxTitle" class="text-2xl font-bold mb-2"></h3>
                <p id="lightboxDescription" class="text-gray-200"></p>
                <div class="flex items-center justify-between mt-4">
                    <div id="lightboxCategory" class="text-sm"></div>
                    <div id="lightboxCounter" class="text-sm"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const lightboxDescription = document.getElementById('lightboxDescription');
    const lightboxCategory = document.getElementById('lightboxCategory');
    const lightboxCounter = document.getElementById('lightboxCounter');
    const closeLightbox = document.getElementById('closeLightbox');
    const prevBtn = document.getElementById('prevImage');
    const nextBtn = document.getElementById('nextImage');
    
    let currentIndex = 0;
    
    // Create gallery data - FIXED: No trailing comma
    const galleryData = [
        @foreach($galleries as $gallery)
        {
            image: '{{ asset($gallery->image) }}',
            title: '{{ addslashes($gallery->title ?? '') }}',
            description: '{{ addslashes($gallery->description ?? '') }}',
            category: '{{ addslashes($gallery->category ?? '') }}'
        }@if(!$loop->last),@endif
        @endforeach
    ];
    
    // Open lightbox
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = index;
            updateLightbox();
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Close lightbox
    closeLightbox.addEventListener('click', closeLightboxFunc);
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightboxFunc();
    });
    
    // Navigation
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + galleryData.length) % galleryData.length;
        updateLightbox();
    });
    
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % galleryData.length;
        updateLightbox();
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') closeLightboxFunc();
            if (e.key === 'ArrowLeft') prevBtn.click();
            if (e.key === 'ArrowRight') nextBtn.click();
        }
    });
    
    // Update lightbox content
    function updateLightbox() {
        const item = galleryData[currentIndex];
        lightboxImage.src = item.image;
        lightboxTitle.textContent = item.title || '';
        lightboxDescription.textContent = item.description || '';
        lightboxCategory.innerHTML = item.category ? 
            `<span class="bg-white/20 px-3 py-1 rounded-full">${item.category}</span>` : '';
        lightboxCounter.textContent = `${currentIndex + 1} / ${galleryData.length}`;
    }
    
    function closeLightboxFunc() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    // Category filtering
    const filterButtons = document.querySelectorAll('.category-filter');
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => {
                if (btn.getAttribute('data-filter') === filter) {
                    btn.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    btn.classList.add('bg-blue-600', 'text-white');
                } else {
                    btn.classList.remove('bg-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                }
            });
            
            // Filter items
            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
});
</script>
@endif