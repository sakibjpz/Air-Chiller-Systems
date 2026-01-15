import '@fortawesome/fontawesome-free/css/all.css';
import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Define banner component FIRST
document.addEventListener('alpine:init', () => {
    Alpine.data('bannerSlider', () => ({
        currentSlide: 0,
        isPlaying: true,
        totalSlides: 3,
        intervalId: null,
        
        init() {
            // Start autoplay
            this.startAutoplay();
            
            // Pause autoplay when tab is not visible
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.pause();
                } else if (this.isPlaying) {
                    this.resume();
                }
            });
        },
        
        startAutoplay() {
            this.intervalId = setInterval(() => {
                this.nextSlide();
            }, 4000);
            this.isPlaying = true;
        },
        
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        },
        
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        },
        
        goToSlide(index) {
            this.currentSlide = index;
        },
        
        pause() {
            if (this.intervalId) {
                clearInterval(this.intervalId);
                this.intervalId = null;
                this.isPlaying = false;
            }
        },
        
        resume() {
            if (!this.intervalId) {
                this.startAutoplay();
            }
        }
    }));
});

// Start Alpine AFTER DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    Alpine.start();
    console.log('Alpine.js started');
    
    // Your existing DOMContentLoaded code...
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    
    if (mobileMenuToggle && mobileMenu && closeMobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
        
        closeMobileMenu.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
        
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    }
});