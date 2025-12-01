<?php
require_once 'header.php';

// Try to get team years, but handle if table doesn't exist yet
try {
    $team_years = $pdo->query("SELECT * FROM team_year_posts ORDER BY year DESC")->fetchAll();
} catch (PDOException $e) {
    // If table doesn't exist, show error message
    echo "<div class='main'><div class='box'>Error: The team_year_posts table doesn't exist yet. Please create it in the database or contact the administrator.</div></div>";
    require_once 'footer.php';
    exit;
}

// If no team years exist, show a message
if (empty($team_years)) {
    echo "<div class='main'><div class='box'>No team data available yet. Please add team year posts through the admin dashboard.</div></div>";
    require_once 'footer.php';
    exit;
}
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass.png" height="200px">
        <br>
        <h2>Wir über uns</h2>
        <h3>-Teamwork makes the dream work-</h3>
    </div>

    <?php foreach ($team_years as $post): 
        // Decode the photos JSON array
        $photos = json_decode($post['photos'] ?? '[]', true);
        // Ensure $photos is always an array
        $photos = is_array($photos) ? $photos : [];
    ?>
    <div class="box">
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <h2><?php echo htmlspecialchars($post['subtitle']); ?></h2>
        
        <?php if (!empty($post['additional_text'])): ?>
        <h3>Gründer:</h3>
        <p><?php echo nl2br(htmlspecialchars($post['additional_text'])); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($post['studentische_leitung'])): ?>
        <h3>Studentische Leitung:</h3>
        <p><?php echo nl2br(htmlspecialchars($post['studentische_leitung'])); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($post['redaktionsmitglieder'])): ?>
        <h3>Redaktionsmitglieder:</h3>
        <ul>
            <?php 
            $members = explode("\n", $post['redaktionsmitglieder']);
            foreach ($members as $member):
                if (trim($member)): ?>
                <li><?php echo htmlspecialchars(trim($member)); ?></li>
                <?php endif;
            endforeach; ?>
        </ul>
        <?php endif; ?>
        
        <?php if (!empty($post['betreuer'])): ?>
        <h3>Betreuer:</h3>
        <p><?php echo nl2br(htmlspecialchars($post['betreuer'])); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($photos)): ?>
        <div class="carouselM">
            <div class="carousel-images">
                <?php foreach ($photos as $index => $photo): 
                    // Make sure the path is correct
                    $image_path = htmlspecialchars($photo);
                ?>
                <img src="<?php echo $image_path; ?>" class="carousel-image" onclick="openPage(this.src)" alt="Team photo <?php echo $index + 1; ?>">
                <?php endforeach; ?>
            </div>
            <?php if (count($photos) > 1): ?>
            <button class="carousel-button prev" onclick="moveCarousel(this, -1)">&#10094;</button>
            <button class="carousel-button next" onclick="moveCarousel(this, 1)">&#10095;</button>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <p><?php echo nl2br(htmlspecialchars($post['financing_text'])); ?></p>
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