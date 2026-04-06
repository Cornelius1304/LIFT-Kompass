// Sidebar toggle
const sidebar = document.getElementById('sidebar');
function toggleSidebar() {
    sidebar.classList.toggle('close');
}

// Dropdown toggle
function toggleDropdown(button) {
    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');
}

// ========== POPUP WITH ZOOM AT CLICK POSITION ==========
const popup = document.getElementById('Popup-Page');
const popupImg = document.getElementById('Page');
let zoomed = false;

function openPage(src) {
    popup.style.display = 'flex';
    popupImg.src = src;
    // Reset zoom and transform
    zoomed = false;
    popupImg.style.transform = 'scale(1)';
    popupImg.style.transformOrigin = 'center center';
    popup.scrollTop = 0;
    popup.scrollLeft = 0;
    document.body.classList.add('popup-open');
}

function closePage() {
    popup.style.display = 'none';
    document.body.classList.remove('popup-open');
}

// Zoom at click position
popupImg.addEventListener('click', function(e) {
    e.stopPropagation();
    
    if (!zoomed) {
        // Get click coordinates relative to the image
        const rect = popupImg.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        // Convert to percentage of image dimensions
        const xPercent = (x / rect.width) * 100;
        const yPercent = (y / rect.height) * 100;
        
        // Set transform origin to clicked point
        popupImg.style.transformOrigin = `${xPercent}% ${yPercent}%`;
        popupImg.style.transform = 'scale(2)';
        zoomed = true;
        popupImg.style.cursor = 'zoom-out';
    } else {
        // Zoom out
        popupImg.style.transform = 'scale(1)';
        popupImg.style.transformOrigin = 'center center';
        zoomed = false;
        popupImg.style.cursor = 'zoom-in';
        // Optional: reset scroll position
        popup.scrollTop = 0;
        popup.scrollLeft = 0;
    }
});

// Close popup when clicking on background (not on image)
popup.addEventListener('click', function(e) {
    if (e.target === popup) {
        closePage();
    }
});

// Prevent accidental drag of the image
popupImg.addEventListener('dragstart', function(e) {
    e.preventDefault();
});

// Set initial cursor
popupImg.style.cursor = 'zoom-in';

// ========== CAROUSEL FUNCTION ==========
function moveCarousel(button, direction) {
    const carousel = button.parentElement;
    const imagesContainer = carousel.querySelector('.carousel-images');
    const images = carousel.querySelectorAll('.carousel-image');
    if (!images.length) return;
    let currentIndex = parseInt(imagesContainer.dataset.currentIndex) || 0;
    let newIndex = currentIndex + direction;
    if (newIndex < 0) newIndex = images.length - 1;
    if (newIndex >= images.length) newIndex = 0;
    imagesContainer.style.transform = `translateX(-${newIndex * 100}%)`;
    imagesContainer.dataset.currentIndex = newIndex;
}

document.addEventListener('DOMContentLoaded', function() {
    const carousels = document.querySelectorAll('.carousel-images');
    carousels.forEach(carousel => {
        if (!carousel.dataset.currentIndex) carousel.dataset.currentIndex = '0';
    });
});