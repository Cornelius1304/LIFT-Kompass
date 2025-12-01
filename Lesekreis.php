<?php
require_once 'header.php';

try {
    $lesekreis_posts = $pdo->query("SELECT * FROM lesekreis ORDER BY date DESC")->fetchAll();
} catch (PDOException $e) {
    // If table doesn't exist, show error message
    echo "<div class='main'><div class='box'>Error: The lesekreis table doesn't exist yet. Please create it in the database or contact the administrator.</div></div>";
    require_once 'footer.php';
    exit;
}

// If no lesekreis posts exist, show a message
if (empty($lesekreis_posts)) {
    echo "<div class='main'><div class='box'>No Lesekreis posts available yet. Please add Lesekreis posts through the admin dashboard.</div></div>";
    require_once 'footer.php';
    exit;
}
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass.png" height="200px">
        <br>
        <h1>Lesekreis</h1>
        <h2>Unsere Lesekreis-Aktivitäten und Treffen</h2>
    </div>

    <?php foreach ($lesekreis_posts as $post): 
        $image_paths = json_decode($post['image_paths'] ?? '[]', true);
        $image_paths = is_array($image_paths) ? $image_paths : [];
    ?>
    <div class="box">
        <h3><?php echo htmlspecialchars($post['title']); ?></h3>
        <p><strong><?php echo date('d.m.Y', strtotime($post['date'])); ?></strong></p>
        
        <?php if (!empty($image_paths)): ?>
            <?php if (count($image_paths) > 1): ?>
            <div class="carousel">
                <div class="carousel-images">
                    <?php foreach ($image_paths as $image_path): ?>
                    <img src="<?php echo htmlspecialchars($image_path); ?>" class="carousel-image" onclick="openPage(this.src)" alt="Lesekreis Bild">
                    <?php endforeach; ?>
                </div>
                <button class="carousel-button prev" onclick="moveCarousel(this, -1)">&#10094;</button>
                <button class="carousel-button next" onclick="moveCarousel(this, 1)">&#10095;</button>
            </div>
            <?php else: ?>
            <img src="<?php echo htmlspecialchars($image_paths[0]); ?>" onclick="openPage(this.src)" alt="Lesekreis Bild" style="max-width: 100%; height: auto; margin: 20px 0;">
            <?php endif; ?>
        <?php endif; ?>
        
        <p><?php echo nl2br(htmlspecialchars($post['description'])); ?></p>
    </div>
    <?php endforeach; ?>
    
    <div class="popupPage" id="Popup-Page">
        <span class="close" onclick="closePage()">&times;</span>
        <img src="" alt="" id="Page">
    </div>
</div>

<script>
// Carousel functionality
function moveCarousel(button, direction) {
    const carousel = button.parentElement;
    const imagesContainer = carousel.querySelector('.carousel-images');
    const images = carousel.querySelectorAll('.carousel-image');
    const imageWidth = images[0].clientWidth;
    
    // Get current transform
    const currentTransform = imagesContainer.style.transform || 'translateX(0px)';
    const currentX = parseInt(currentTransform.match(/translateX\((-?\d+)px\)/)[1]) || 0;
    
    // Calculate new position
    let newX = currentX + (direction * imageWidth);
    
    // Boundary checks
    const maxX = 0;
    const minX = -(imageWidth * (images.length - 1));
    
    if (newX > maxX) newX = minX; // Wrap to last if going past first
    if (newX < minX) newX = maxX; // Wrap to first if going past last
    
    // Apply new transform
    imagesContainer.style.transform = `translateX(${newX}px)`;
}

// Image popup functionality
function openPage(src) {
    document.getElementById("Popup-Page").style.display = "flex";
    document.getElementById("Page").src = src;
}

function closePage() {
    document.getElementById("Popup-Page").style.display = "none";
}

// Close popup when clicking outside the image
document.getElementById("Popup-Page").addEventListener('click', function(e) {
    if (e.target === this || e.target.classList.contains('close')) {
        closePage();
    }
});
</script>

<?php
require_once 'footer.php';
?>