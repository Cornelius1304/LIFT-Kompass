<?php
$folder = 'Mitglieder/';
$files = scandir($folder);
echo "<h2>Images in Mitglieder folder:</h2><ul>";
foreach ($files as $file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        echo "<li><img src='/$folder$file' width='100'> - /{$folder}{$file}</li>";
    }
}
echo "</ul>";
?>