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
let scale = 1; // Initial scale
const zoomStep = 1.5; // Zoom increment

img.addEventListener('click', (event) => {
    const rect = img.getBoundingClientRect();
    
    // Calculate mouse click position relative to the image
    const offsetX = event.clientX - rect.left;
    const offsetY = event.clientY - rect.top;

    // Toggle scale
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


const images = [
    'url("Ai1.jpg")',
    'url("Ai2.png")',
    'url("Ai3.png")',
];

const gallery = document.querySelector('.background-image');

let currentIndex = 0;

function changeBackground() {
    gallery.style.backgroundImage = images[currentIndex];
    gallery.classList.add('active');

    setTimeout(() => {
        gallery.classList.remove('active');
    }, 5000);

    currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBackground, 6000);
changeBackground();