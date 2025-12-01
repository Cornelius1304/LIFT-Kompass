<?php
// download_handler.php
session_start();
require_once 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('Invalid request');
}

$issue_id = intval($_GET['id']);

// Get the issue and PDF path
$stmt = $pdo->prepare("SELECT * FROM issues WHERE id = ?");
$stmt->execute([$issue_id]);
$issue = $stmt->fetch();

if (!$issue || empty($issue['pdf_path'])) {
    die('File not found in database');
}

$file_path = $_SERVER['DOCUMENT_ROOT'] . $issue['pdf_path'];

// Check if file exists
if (!file_exists($file_path)) {
    // Try alternative path for older issues
    $alt_path = $_SERVER['DOCUMENT_ROOT'] . str_replace('/LIFT-Kompass/', '/', $issue['pdf_path']);
    if (file_exists($alt_path)) {
        $file_path = $alt_path;
    } else {
        die('File not found on server: ' . $file_path);
    }
}

// Get the filename for download
$filename = 'Kompass_Ausgabe_' . $issue_id . '.pdf';

// Set headers for PDF download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($file_path));
header('Cache-Control: no-cache');
header('Pragma: no-cache');
header('Expires: 0');

// Output the file
readfile($file_path);
exit;
?>