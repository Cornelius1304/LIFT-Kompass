<?php
require_once 'config.php';
require_once 'header.php';
$issues = getIssuesWithPages($pdo);
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass_short.png" height="200px">
        <h1 style="font-size: 1.2rem;">die deutschsprachige Studentenzeitung<br>
            der Fakultät für Philologie, Geschichte, Philosophie und Theologie<br>
            an der West-Universität Temeswar</h1>
        <br>
    </div>
    <div class="Ausgaben">
        <ul>
            <?php foreach ($issues as $issue): ?>
            <li>
                <button onclick="toggleDropdown(this)" class="dropdownButton">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-200 240-440l56-56 184 183 184-183 56 56-240 240Zm0-240L240-680l56-56 184 183 184-183 56 56-240 240Z"/></svg>
                    <span><?php echo htmlspecialchars($issue['title']); ?></span>
                </button>
                <ul class="dropdown">
                    <div>
                        <p><?php echo nl2br(htmlspecialchars($issue['description'])); ?></p>
                        <div class="PageContainer">
                            <?php foreach ($issue['pages'] as $page): ?>
                            <div class="PageImage">
                                <img src="<?php echo htmlspecialchars($page['image_path']); ?>" onclick="openPage(this.src)">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </ul>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- SINGLE POPUP – outside the loop -->
<div class="popupPage" id="Popup-Page">
    <span class="close" onclick="closePage()">&times;</span>
    <img src="" alt="" id="Page">
</div>

<?php require_once 'footer.php'; ?>