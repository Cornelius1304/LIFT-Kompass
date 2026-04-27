<?php
require_once 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIFT-Kompass</title>
    <link rel="stylesheet" href="Kompass.css">
    <script src="Kompass.js" defer></script>
</head>
<body>
    <nav>
        <img src="FLIFT-02.png" alt="FLIFT">        
        <div class="nav-logos">
            <img src="Logo_Kompass_transparent.png" alt="LIT Kompass" id="departament" style="height: 200px; width: auto; max-width: none; margin-right: -10p;">        
        </div>
    </nav>
    
    <aside id="sidebar">
        <ul>
            <li><button id="button" onclick="toggleSidebar()"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg><span class="Inhalt">Inhalt</span></button></li>
            
            <!-- Ausgaben (Home) -->
            <li class="main-tab"><a href="Kompass.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg><span>Ausgaben</span></a></li>
            
            <!-- Mitglieder -->
            <li class="main-tab"><a href="Mitglieder.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t81 35.5q33 19 49 47t16 59v112H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113Z"/></svg><span>Mitglieder</span></a></li>
            
            <!-- Pressestimmen -->
            <li class="main-tab"><a href="Pressestimmen.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M160-120q-33 0-56.5-23.5T80-200v-480q0-33 23.5-56.5T160-760h160v-80h480v520q0 33-23.5 56.5T720-240H160v40q0 17 11.5 28.5T200-160h560v-560h80v560q0 33-23.5 56.5T760-120H160Zm80-280h240v-160H240v160Zm320-200h160v-80H560v80Zm0 120h160v-80H560v80Zm0 120h160v-80H560v80ZM240-400v-160 160Z"/></svg><span>Pressestimmen</span></a></li>
            
            <!-- Veranstaltungen -->
            <li class="main-tab"><a href="Veranstaltungen.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg><span>Veranstaltungen</span></a></li>
            
            <!-- Separator line -->
            <li class="separator-item"><hr class="sidebar-separator"></li>
            
            <!-- Lesekreis (separate group) -->
            <li class="lesekreis-tab"><a href="Lesekreis.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6q47 0 91.5 10.5T440-278Zm40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q74 0 126 17t112 52q11 6 16.5 14t5.5 21v418q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-481q15 5 29.5 11t28.5 14q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59Zm-40-99Z"/></svg><span>Lesekreis</span></a></li>
        </ul>
    </aside>
    
    <main>
        <script>
            function toggleSidebar() {
                document.getElementById('sidebar').classList.toggle('close');
            }
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('close');
            }
        </script>