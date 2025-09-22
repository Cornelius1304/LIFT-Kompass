<?php
$host = 'localhost';
$dbname = 'kompass_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to get all issues with their pages
function getIssuesWithPages($pdo) {
    $stmt = $pdo->query("SELECT * FROM issues ORDER BY id DESC");
    $issues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($issues as &$issue) {
        $stmt = $pdo->prepare("SELECT * FROM pages WHERE issue_id = ? ORDER BY page_number");
        $stmt->execute([$issue['id']]);
        $issue['pages'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $issues;
}

// Function to get all events
function getEvents($pdo) {
    $stmt = $pdo->query("SELECT * FROM events ORDER BY date DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get all press mentions
function getPress($pdo) {
    $stmt = $pdo->query("SELECT * FROM press ORDER BY id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get members by team year
function getMembersByYear($pdo, $year) {
    $stmt = $pdo->prepare("SELECT * FROM members WHERE team_year = ? ORDER BY role, name");
    $stmt->execute([$year]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get unique team years
function getTeamYears($pdo) {
    $stmt = $pdo->query("SELECT DISTINCT team_year FROM members WHERE team_year IS NOT NULL ORDER BY team_year DESC");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function isAdminLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Redirect to login if not admin
function requireAdmin() {
    if (!isAdminLoggedIn()) {
        header('Location: admin_login.php');
        exit;
    }
}
?>