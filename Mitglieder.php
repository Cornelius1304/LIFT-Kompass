<?php
require_once 'header.php';
$team_years = getTeamYears($pdo);
?>

<div class="main">
    <div class="header">
        <img src="FLIFT-03.png" height="200px">
        <img src="Logo_Kompass.png" height="200px">
        <br>
        <h2>Wir über uns</h2>
        <h3>-Teamwork makes the dream work-</h3>
    </div>

    <?php foreach ($team_years as $year): 
        $members = getMembersByYear($pdo, $year);
        $grouped_members = [];
        foreach ($members as $member) {
            $role = $member['role'];
            if (!isset($grouped_members[$role])) {
                $grouped_members[$role] = [];
            }
            $grouped_members[$role][] = $member;
        }
    ?>
    <div class="box">
        <h2>Redaktion <?php echo $year; ?></h2>
        <h2>Jahrgang <?php echo substr($year, -1); ?> - 
            <?php 
            $issues_text = "";
            if ($year == "2020-2021") $issues_text = "Nummer 1, Nummer 2, Nummer 3";
            elseif ($year == "2022") $issues_text = "Nummer 4, Nummer 5, Nummer 6";
            elseif ($year == "2023") $issues_text = "Nummer 7, Nummer 8";
            echo $issues_text;
            ?>
        </h2>
        
        <?php foreach ($grouped_members as $role => $role_members): ?>
        <h3><?php echo htmlspecialchars($role); ?>:</h3>
        
        <?php if ($role == 'Redaktionsmitglieder' || $role == 'Betreuer'): ?>
        <ul>
            <?php foreach ($role_members as $member): ?>
            <li>
                <?php echo htmlspecialchars($member['name']); ?>
                <?php if (!empty($member['year'])): ?>
                - <?php echo htmlspecialchars($member['year']); ?>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <p>
            <?php foreach ($role_members as $member): ?>
            <?php echo htmlspecialchars($member['name']); ?>
            <?php if (!empty($member['year'])): ?>
            <br><?php echo htmlspecialchars($member['year']); ?>
            <?php endif; ?>
            <br>
            <?php endforeach; ?>
        </p>
        <?php endif; ?>
        <?php endforeach; ?>
        
        <?php if ($year == "2020-2021"): ?>
        <div class="carouselM">
            <div class="carousel-images">
                <img src="Mitglieder/1.1.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/1.2.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/1.3.jpg" class="carousel-image" onclick="openPage(this.src)">
            </div>
            <button class="carousel-button prev" onclick="moveCarousel(this, -1)">&#10094;</button>
            <button class="carousel-button next" onclick="moveCarousel(this, 1)">&#10095;</button>
        </div>
        <?php elseif ($year == "2022"): ?>
        <div class="carouselM">
            <div class="carousel-images">
                <img src="Mitglieder/2.1.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/2.2.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/2.3.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/2.4.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/2.5.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/2.6.jpg" class="carousel-image" onclick="openPage(this.src)">
            </div>
            <button class="carousel-button prev" onclick="moveCarousel(this, -1)">&#10094;</button>
            <button class="carousel-button next" onclick="moveCarousel(this, 1)">&#10095;</button>
        </div>
        <?php elseif ($year == "2023"): ?>
        <div class="carouselM">
            <div class="carousel-images">
                <img src="Mitglieder/3.1.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/3.2.jpg" class="carousel-image" onclick="openPage(this.src)">
                <img src="Mitglieder/3.3.jpg" class="carousel-image" onclick="openPage(this.src)">
            </div>
            <button class="carousel-button prev" onclick="moveCarousel(this, -1)">&#10094;</button>
            <button class="carousel-button next" onclick="moveCarousel(this, 1)">&#10095;</button>
        </div>
        <?php endif; ?>
        
        <p>In Zusammenarbeit mit der Banater Zeitung (Chefredakteur Siegfried Thiel) und mit technischer Unterstützung von der ADZ.
            <?php if ($year == "2020-2021"): ?>
            Finanzierung der Druckversion: Demokratisches Forum der Deutschen im Banat.
            <?php else: ?>
            Finanzierung der Druckversion: Demokratisches Forum der Deutschen im Banat.
            <?php endif; ?>
        </p>
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