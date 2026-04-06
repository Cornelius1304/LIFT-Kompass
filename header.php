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
        <img src="FLIFT-03.png" alt="FLIFT">
        <img src="Logo_Kompass.png" alt="LIT Kompass" id="departament">
    </nav>
    
    <aside id="sidebar">
        <ul>
            <li><button id="button" onclick="toggleSidebar()"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg><span class="Inhalt">Inhalt</span></button></li>
            <li class="active"><a href="Kompass.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg><span>Ausgaben</span></a></li>
            <li><a href="Mitglieder.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t81 35.5q33 19 49 47t16 59v112H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113Z"/></svg><span>Team</span></a></li>
            <li><a href="Pressestimmen.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M160-120q-33 0-56.5-23.5T80-200v-480q0-33 23.5-56.5T160-760h160v-80h480v520q0 33-23.5 56.5T720-240H160v40q0 17 11.5 28.5T200-160h560v-560h80v560q0 33-23.5 56.5T760-120H160Zm80-280h240v-160H240v160Zm320-200h160v-80H560v80Zm0 120h160v-80H560v80Zm0 120h160v-80H560v80ZM240-400v-160 160Z"/></svg><span>Presse</span></a></li>
            <li><a href="Veranstaltungen.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3471B8"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg><span>Veranstaltungen</span></a></li>
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