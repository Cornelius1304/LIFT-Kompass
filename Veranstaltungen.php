<?php
require_once 'header.php';
$events = getEvents($pdo);
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass.png" height="200px">
        <br>
        <h1>Was wir so tun</h1>
        <h2>Fotos von unseren Veranstaltungen</h2>
    </div>

    <?php foreach ($events as $event): 
        $image_paths = json_decode($event['image_paths'], true);
    ?>
    <div class="box">
        <p><?php echo date('d.m.Y', strtotime($event['date'])); ?></p>
        
        <?php if (!empty($image_paths)): ?>
            <?php if (count($image_paths) > 1): ?>
            <div class="carousel">
                <div class="carousel-images">
                    <?php foreach ($image_paths as $image_path): ?>
                    <img src="<?php echo htmlspecialchars($image_path); ?>" class="carousel-image" onclick="openPage(this.src)">
                    <?php endforeach; ?>
                </div>
                <button class="carousel-button prev" onclick="moveCarousel(this, -1)">&#10094;</button>
                <button class="carousel-button next" onclick="moveCarousel(this, 1)">&#10095;</button>
            </div>
            <?php else: ?>
            <img src="<?php echo htmlspecialchars($image_paths[0]); ?>" onclick="openPage(this.src)">
            <?php endif; ?>
        <?php endif; ?>
        
        <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
    </div>
    <?php endforeach; ?>
    
    <div class="popupPage" id="Popup-Page">
        <span class="close" onclick="closePage()">&times;</span>
        <img src="" alt="" id="Page">
    </div>
</div>

<?php
require_once 'footer.php';
?>