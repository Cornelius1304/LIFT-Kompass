<?php
require_once 'header.php';
$press_mentions = getPress($pdo);
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass.png" height="200px">
        <h1>Pressestimmen: LIT KOMPASS<br>
            11. Juni 2021</h1>
        <br><hr><br>
    </div>
    <div class="presse">
        <?php foreach ($press_mentions as $press): ?>
        <h2><?php echo htmlspecialchars($press['source']); ?></h2>
        <span>
            <a href="<?php echo htmlspecialchars($press['url']); ?>" target="_blank">
                <?php echo htmlspecialchars($press['title']); ?>
            </a>
        </span>
        <?php endforeach; ?>
    </div>
</div>

<?php
require_once 'footer.php';
?>