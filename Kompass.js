const sidebar = document.getElementById('sidebar');
const PageContainer = document.getElementById('PageContainer');

function toggleSidebar(){
    sidebar.classList.toggle('close')
}

function toggleDropdown(button){
    button.nextElementSibling.classList.toggle('show')
    button.classList.toggle('rotate')
}

let PopupPage = document.getElementById('Popup-Page');
let Page = document.getElementById('Page');

function openPage(sisi){
    PopupPage.style.display = "flex";
    Page.src = sisi;
}

function closePage(){
    PopupPage.style.display = "none";
}

const img = document.getElementById('Page');
let scale = 1;
const zoomStep = 1.5;

img.addEventListener('click', (event) => {
    const rect = img.getBoundingClientRect();
    
    const offsetX = event.clientX - rect.left;
    const offsetY = event.clientY - rect.top;

    scale = scale === 1 ? 1 + zoomStep : 1; 
    img.style.transform = `scale(${scale})`;
    img.style.transformOrigin = `${(offsetX / img.width) * 100}% ${(offsetY / img.height) * 100}%`;
});


image.addEventListener('mousemove', (event) => {
    if (scale > 1) {
        const rect = image.getBoundingClientRect();
        const mouseX = event.clientX - rect.left;
        const mouseY = event.clientY - rect.top;
        image.style.transformOrigin = `${mouseX}px ${mouseY}px`;
    }
});

function moveCarousel(button, direction) {
    const carousel = button.parentElement.querySelector('.carousel-images');
    const totalImages = carousel.children.length;
    let currentIndex = (parseInt(carousel.dataset.currentIndex) || 0) + direction;

    if (currentIndex < 0) {
        currentIndex = totalImages - 1;
    } else if (currentIndex >= totalImages) {
        currentIndex = 0;
    }

    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    carousel.dataset.currentIndex = currentIndex;
}


