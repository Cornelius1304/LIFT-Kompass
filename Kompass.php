<?php
require_once 'header.php';
$issues = getIssuesWithPages($pdo);
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass.png" height="200px">
        <h1>die deutschsprachige Studentenzeitung<br>
            der Fakultät für Philologie, Geschichte, Philosophie und Theologie<br>
            an der West-Universität Temeswar</h1>
        <br>
        <h2>Ausgaben</h2>
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
                            <div class="download">
                                <a href="download_handler.php?id=<?php echo $issue['id']; ?>" class="download">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
                                Lade die <?php echo !empty($issue['issue_number']) ? htmlspecialchars($issue['issue_number']) : htmlspecialchars($issue['id']); ?>. Nummer herunter
                                </a>
                            </div>
                            
                            <div class="popupPage" id="Popup-Page">
                                <span class="close" onclick="closePage()">&times;</span>
                                <img src="<?php echo !empty($issue['pages']) ? htmlspecialchars($issue['pages'][0]['image_path']) : ''; ?>" alt="" id="Page">
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php
require_once 'footer.php';
?>