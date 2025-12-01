<?php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin_login.php');
    exit;
}

// Handle form submissions
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['add_event'])) {
            // Add new event
            $date = $_POST['date'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            // Handle image uploads
            $image_paths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $upload_dir = "Veranstaltungen/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                        $target_path = $upload_dir . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $image_paths[] = "/LIFT-Kompass/" . $target_path;
                        }
                    }
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO events (date, title, description, image_paths) VALUES (?, ?, ?, ?)");
            $stmt->execute([$date, $title, $description, json_encode($image_paths)]);
            $message = "Event added successfully!";
            
        } elseif (isset($_POST['update_event'])) {
            // Update existing event
            $event_id = $_POST['event_id'];
            $date = $_POST['date'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            // Handle image uploads
            $image_paths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $upload_dir = "Veranstaltungen/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                        $target_path = $upload_dir . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $image_paths[] = "/LIFT-Kompass/" . $target_path;
                        }
                    }
                }
                // If new images uploaded, update image_paths
                $stmt = $pdo->prepare("UPDATE events SET date = ?, title = ?, description = ?, image_paths = ? WHERE id = ?");
                $stmt->execute([$date, $title, $description, json_encode($image_paths), $event_id]);
            } else {
                // Keep existing images
                $stmt = $pdo->prepare("UPDATE events SET date = ?, title = ?, description = ? WHERE id = ?");
                $stmt->execute([$date, $title, $description, $event_id]);
            }
            $message = "Event updated successfully!";
            
        } elseif (isset($_POST['add_issue'])) {
            // Add new issue
            $title = $_POST['issue_title'];
            $description = $_POST['issue_description'];
            
            // Handle PDF upload - save to LIFT-Kompass/Ausgaben/
            $pdf_path = '';
            if (!empty($_FILES['pdf']['name'])) {
                $upload_dir = "Ausgaben/"; // Relative to admin_dashboard.php location
                
                $filename = uniqid() . '_' . basename($_FILES['pdf']['name']);
                $target_path = $upload_dir . $filename;
                
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target_path)) {
                    $pdf_path = "/LIFT-Kompass/Ausgaben/" . $filename;
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO issues (title, description, pdf_path) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $pdf_path]);
            $message = "Issue added successfully!";
            
        } elseif (isset($_POST['update_issue'])) {
            // Update existing issue
            $issue_id = $_POST['issue_id'];
            $title = $_POST['issue_title'];
            $description = $_POST['issue_description'];
            
            // Handle PDF upload - save to LIFT-Kompass/Ausgaben/
            $pdf_path = '';
            if (!empty($_FILES['pdf']['name'])) {
                $upload_dir = "Ausgaben/"; // Relative to admin_dashboard.php location
                
                $filename = uniqid() . '_' . basename($_FILES['pdf']['name']);
                $target_path = $upload_dir . $filename;
                
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target_path)) {
                    $pdf_path = "/LIFT-Kompass/Ausgaben/" . $filename;
                }
                $stmt = $pdo->prepare("UPDATE issues SET title = ?, description = ?, pdf_path = ? WHERE id = ?");
                $stmt->execute([$title, $description, $pdf_path, $issue_id]);
            } else {
                $stmt = $pdo->prepare("UPDATE issues SET title = ?, description = ? WHERE id = ?");
                $stmt->execute([$title, $description, $issue_id]);
            }
            $message = "Issue updated successfully!";
            
        } elseif (isset($_POST['add_press'])) {
            // Add new press mention
            $source = $_POST['press_source'];
            $title = $_POST['press_title'];
            $url = $_POST['press_url'];
            
            $stmt = $pdo->prepare("INSERT INTO press (source, title, url) VALUES (?, ?, ?)");
            $stmt->execute([$source, $title, $url]);
            $message = "Press mention added successfully!";
            
        } elseif (isset($_POST['update_press'])) {
            // Update existing press mention
            $press_id = $_POST['press_id'];
            $source = $_POST['press_source'];
            $title = $_POST['press_title'];
            $url = $_POST['press_url'];
            
            $stmt = $pdo->prepare("UPDATE press SET source = ?, title = ?, url = ? WHERE id = ?");
            $stmt->execute([$source, $title, $url, $press_id]);
            $message = "Press mention updated successfully!";
            
        } elseif (isset($_POST['add_member_post'])) {
            // Add new team year post
            $year = $_POST['year'];
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $betreuer = $_POST['betreuer'];
            $redaktionsmitglieder = $_POST['redaktionsmitglieder'];
            $studentische_leitung = $_POST['studentische_leitung'];
            $additional_text = $_POST['additional_text'];
            $financing_text = $_POST['financing_text'];
            
            // Handle photo uploads
            $photos = [];
            if (!empty($_FILES['team_photos']['name'][0])) {
                $upload_dir = "Mitglieder/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                foreach ($_FILES['team_photos']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['team_photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['team_photos']['name'][$key]);
                        $target_path = $upload_dir . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $photos[] = "/LIFT-Kompass/" . $target_path;
                        }
                    }
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO team_year_posts (year, title, subtitle, betreuer, redaktionsmitglieder, studentische_leitung, additional_text, photos, financing_text) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$year, $title, $subtitle, $betreuer, $redaktionsmitglieder, $studentische_leitung, $additional_text, json_encode($photos), $financing_text]);
            $message = "Team year post added successfully!";
            
        } elseif (isset($_POST['update_member_post'])) {
            // Update existing team year post
            $post_id = $_POST['member_post_id'];
            $year = $_POST['year'];
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $betreuer = $_POST['betreuer'];
            $redaktionsmitglieder = $_POST['redaktionsmitglieder'];
            $studentische_leitung = $_POST['studentische_leitung'];
            $additional_text = $_POST['additional_text'];
            $financing_text = $_POST['financing_text'];
            
            // Handle photo uploads
            $new_photos = [];
            if (!empty($_FILES['team_photos']['name'][0])) {
                $upload_dir = "Mitglieder/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                foreach ($_FILES['team_photos']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['team_photos']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['team_photos']['name'][$key]);
                        $target_path = $upload_dir . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $new_photos[] = "/LIFT-Kompass/" . $target_path;
                        }
                    }
                }
            }
            
            // Get existing photos if any
            $existing_photos = [];
            if (isset($edit_member_post) && $edit_member_post && $edit_member_post['photos']) {
                $existing_photos = json_decode($edit_member_post['photos'], true);
            }
            
            // Combine existing and new photos
            $all_photos = array_merge($existing_photos, $new_photos);
            
            $stmt = $pdo->prepare("UPDATE team_year_posts SET year = ?, title = ?, subtitle = ?, betreuer = ?, redaktionsmitglieder = ?, studentische_leitung = ?, additional_text = ?, photos = ?, financing_text = ? WHERE id = ?");
            $stmt->execute([$year, $title, $subtitle, $betreuer, $redaktionsmitglieder, $studentische_leitung, $additional_text, json_encode($all_photos), $financing_text, $post_id]);
            $message = "Team year post updated successfully!";
            
        } elseif (isset($_POST['delete_member_post'])) {
            // Delete team year post
            $stmt = $pdo->prepare("DELETE FROM team_year_posts WHERE id = ?");
            $stmt->execute([$_POST['member_post_id']]);
            $message = "Team year post deleted successfully!";
            
        } elseif (isset($_POST['add_lesekreis'])) {
            // Add new lesekreis post
            $date = $_POST['date'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            // Handle image uploads
            $image_paths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $upload_dir = "Lesekreis/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                        $target_path = $upload_dir . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $image_paths[] = "/LIFT-Kompass/" . $target_path;
                        }
                    }
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO lesekreis (date, title, description, image_paths) VALUES (?, ?, ?, ?)");
            $stmt->execute([$date, $title, $description, json_encode($image_paths)]);
            $message = "Lesekreis post added successfully!";
            
        } elseif (isset($_POST['update_lesekreis'])) {
            // Update existing lesekreis post
            $lesekreis_id = $_POST['lesekreis_id'];
            $date = $_POST['date'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            // Handle image uploads
            $image_paths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $upload_dir = "Lesekreis/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                        $target_path = $upload_dir . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $image_paths[] = "/LIFT-Kompass/" . $target_path;
                        }
                    }
                }
                // If new images uploaded, update image_paths
                $stmt = $pdo->prepare("UPDATE lesekreis SET date = ?, title = ?, description = ?, image_paths = ? WHERE id = ?");
                $stmt->execute([$date, $title, $description, json_encode($image_paths), $lesekreis_id]);
            } else {
                // Keep existing images
                $stmt = $pdo->prepare("UPDATE lesekreis SET date = ?, title = ?, description = ? WHERE id = ?");
                $stmt->execute([$date, $title, $description, $lesekreis_id]);
            }
            $message = "Lesekreis post updated successfully!";
            
        } elseif (isset($_POST['delete_lesekreis'])) {
            // Delete lesekreis post
            $stmt = $pdo->prepare("DELETE FROM lesekreis WHERE id = ?");
            $stmt->execute([$_POST['lesekreis_id']]);
            $message = "Lesekreis post deleted successfully!";
            
        } elseif (isset($_POST['delete_event'])) {
            // Delete event
            $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
            $stmt->execute([$_POST['event_id']]);
            $message = "Event deleted successfully!";
            
        } elseif (isset($_POST['delete_issue'])) {
            // Delete issue
            $stmt = $pdo->prepare("DELETE FROM issues WHERE id = ?");
            $stmt->execute([$_POST['issue_id']]);
            $message = "Issue deleted successfully!";
            
        } elseif (isset($_POST['delete_press'])) {
            // Delete press mention
            $stmt = $pdo->prepare("DELETE FROM press WHERE id = ?");
            $stmt->execute([$_POST['press_id']]);
            $message = "Press mention deleted successfully!";
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Get current data
$events = $pdo->query("SELECT * FROM events ORDER BY date DESC")->fetchAll();
$issues = $pdo->query("SELECT * FROM issues ORDER BY id DESC")->fetchAll();
$press_mentions = $pdo->query("SELECT * FROM press ORDER BY id")->fetchAll();
$member_posts = $pdo->query("SELECT * FROM team_year_posts ORDER BY year DESC")->fetchAll();
$lesekreis_posts = $pdo->query("SELECT * FROM lesekreis ORDER BY date DESC")->fetchAll();

// Get data for editing if ID provided
$edit_event = null;
$edit_issue = null;
$edit_press = null;
$edit_member_post = null;
$edit_lesekreis = null;

if (isset($_GET['edit_event'])) {
    $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->execute([$_GET['edit_event']]);
    $edit_event = $stmt->fetch();
}

if (isset($_GET['edit_issue'])) {
    $stmt = $pdo->prepare("SELECT * FROM issues WHERE id = ?");
    $stmt->execute([$_GET['edit_issue']]);
    $edit_issue = $stmt->fetch();
}

if (isset($_GET['edit_press'])) {
    $stmt = $pdo->prepare("SELECT * FROM press WHERE id = ?");
    $stmt->execute([$_GET['edit_press']]);
    $edit_press = $stmt->fetch();
}

if (isset($_GET['edit_member_post'])) {
    $stmt = $pdo->prepare("SELECT * FROM team_year_posts WHERE id = ?");
    $stmt->execute([$_GET['edit_member_post']]);
    $edit_member_post = $stmt->fetch();
}

if (isset($_GET['edit_lesekreis'])) {
    $stmt = $pdo->prepare("SELECT * FROM lesekreis WHERE id = ?");
    $stmt->execute([$_GET['edit_lesekreis']]);
    $edit_lesekreis = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Kompass</title>
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .section {
            margin: 30px 0;
            padding: 20px;
            border: 1px solid #3471B8;
            border-radius: 10px;
        }
        .form-group {
            margin: 10px 0;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 100px;
        }
        button {
            background-color: #3471B8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        .edit-btn {
            background-color: #28a745;
        }
        .cancel-btn {
            background-color: #6c757d;
        }
        .logout-btn {
            background-color: #dc3545;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
        }
        .message {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            background-color: #f1f1f1;
            cursor: pointer;
            margin-right: 5px;
            border-radius: 5px 5px 0 0;
        }
        .tab.active {
            background-color: #3471B8;
            color: white;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .current-images {
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .current-images img {
            max-width: 100px;
            margin: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Admin Dashboard - Kompass</h1>
        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        
        <a href="?logout" class="logout-btn">Logout</a>

        <div class="tabs">
            <div class="tab active" onclick="showTab('events')">Events</div>
            <div class="tab" onclick="showTab('issues')">Issues</div>
            <div class="tab" onclick="showTab('press')">Press</div>
            <div class="tab" onclick="showTab('members')">Members</div>
            <div class="tab" onclick="showTab('lesekreis')">Lesekreis</div>
        </div>

        <!-- Events Tab -->
        <div id="events" class="tab-content active">
            <div class="section">
                <h2><?= $edit_event ? 'Edit Event' : 'Add New Event' ?></h2>
                <form method="POST" enctype="multipart/form-data">
                    <?php if ($edit_event): ?>
                        <input type="hidden" name="event_id" value="<?= $edit_event['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" name="date" value="<?= $edit_event ? $edit_event['date'] : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" value="<?= $edit_event ? htmlspecialchars($edit_event['title']) : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" required><?= $edit_event ? htmlspecialchars($edit_event['description']) : '' ?></textarea>
                    </div>
                    
                    <?php if ($edit_event && $edit_event['image_paths']): ?>
                        <div class="current-images">
                            <strong>Current Images:</strong><br>
                            <?php 
                            $images = json_decode($edit_event['image_paths'], true);
                            foreach ($images as $image): ?>
                                <img src="<?= htmlspecialchars($image) ?>" alt="Event image">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>New Images (optional):</label>
                        <input type="file" name="images[]" multiple accept="image/*">
                    </div>
                    
                    <?php if ($edit_event): ?>
                        <button type="submit" name="update_event">Update Event</button>
                        <a href="?" class="cancel-btn" style="text-decoration: none; display: inline-block;">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="add_event">Add Event</button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="section">
                <h2>Current Events</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= $event['id'] ?></td>
                        <td><?= $event['date'] ?></td>
                        <td><?= htmlspecialchars($event['title']) ?></td>
                        <td>
                            <a href="?edit_event=<?= $event['id'] ?>#events" class="edit-btn" style="text-decoration: none; display: inline-block;">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                                <button type="submit" name="delete_event" onclick="return confirm('Delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <!-- Issues Tab -->
        <div id="issues" class="tab-content">
            <div class="section">
                <h2><?= $edit_issue ? 'Edit Issue' : 'Add New Issue' ?></h2>
                <form method="POST" enctype="multipart/form-data">
                    <?php if ($edit_issue): ?>
                        <input type="hidden" name="issue_id" value="<?= $edit_issue['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="issue_title" value="<?= $edit_issue ? htmlspecialchars($edit_issue['title']) : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="issue_description" required><?= $edit_issue ? htmlspecialchars($edit_issue['description']) : '' ?></textarea>
                    </div>
                    
                    <?php if ($edit_issue && $edit_issue['pdf_path']): ?>
                        <div class="current-images">
                            <strong>Current PDF:</strong> <?= htmlspecialchars(basename($edit_issue['pdf_path'])) ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>PDF File:</label>
                        <input type="file" name="pdf" accept=".pdf" <?= !$edit_issue ? 'required' : '' ?>>
                        <?php if ($edit_issue): ?>
                            <small>Leave empty to keep current PDF</small>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($edit_issue): ?>
                        <button type="submit" name="update_issue">Update Issue</button>
                        <a href="?" class="cancel-btn" style="text-decoration: none; display: inline-block;">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="add_issue">Add Issue</button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="section">
                <h2>Current Issues</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>PDF Path</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($issues as $issue): ?>
                    <tr>
                        <td><?= $issue['id'] ?></td>
                        <td><?= htmlspecialchars($issue['title']) ?></td>
                        <td><?= htmlspecialchars($issue['pdf_path']) ?></td>
                        <td>
                            <a href="?edit_issue=<?= $issue['id'] ?>#issues" class="edit-btn" style="text-decoration: none; display: inline-block;">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="issue_id" value="<?= $issue['id'] ?>">
                                <button type="submit" name="delete_issue" onclick="return confirm('Delete this issue?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <!-- Press Tab -->
        <div id="press" class="tab-content">
            <div class="section">
                <h2><?= $edit_press ? 'Edit Press Mention' : 'Add New Press Mention' ?></h2>
                <form method="POST">
                    <?php if ($edit_press): ?>
                        <input type="hidden" name="press_id" value="<?= $edit_press['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Source:</label>
                        <input type="text" name="press_source" value="<?= $edit_press ? htmlspecialchars($edit_press['source']) : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="press_title" value="<?= $edit_press ? htmlspecialchars($edit_press['title']) : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label>URL:</label>
                        <input type="url" name="press_url" value="<?= $edit_press ? htmlspecialchars($edit_press['url']) : '' ?>" required>
                    </div>
                    
                    <?php if ($edit_press): ?>
                        <button type="submit" name="update_press">Update Press Mention</button>
                        <a href="?" class="cancel-btn" style="text-decoration: none; display: inline-block;">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="add_press">Add Press Mention</button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="section">
                <h2>Current Press Mentions</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Source</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($press_mentions as $press): ?>
                    <tr>
                        <td><?= $press['id'] ?></td>
                        <td><?= htmlspecialchars($press['source']) ?></td>
                        <td><?= htmlspecialchars($press['title']) ?></td>
                        <td><?= htmlspecialchars($press['url']) ?></td>
                        <td>
                            <a href="?edit_press=<?= $press['id'] ?>#press" class="edit-btn" style="text-decoration: none; display: inline-block;">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="press_id" value="<?= $press['id'] ?>">
                                <button type="submit" name="delete_press" onclick="return confirm('Delete this press mention?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <!-- Members Tab -->
        <div id="members" class="tab-content">
            <div class="section">
                <h2><?= (isset($edit_member_post) && $edit_member_post) ? 'Edit Team Year Post' : 'Add New Team Year Post' ?></h2>
                <form method="POST" enctype="multipart/form-data">
                    <?php if (isset($edit_member_post) && $edit_member_post): ?>
                        <input type="hidden" name="member_post_id" value="<?= $edit_member_post['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Year:</label>
                        <input type="text" name="year" value="<?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['year']) : '' ?>" required placeholder="e.g., 2020-2021">
                    </div>
                    
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" value="<?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['title']) : '' ?>" required placeholder="e.g., Redaktion 2020-2021">
                    </div>
                    
                    <div class="form-group">
                        <label>Subtitle:</label>
                        <input type="text" name="subtitle" value="<?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['subtitle']) : '' ?>" required placeholder="e.g., Jahrgang 1 - Nummer 1, Nummer 2, Nummer 3">
                    </div>
                    
                    <div class="form-group">
                        <label>Betreuer:</label>
                        <textarea name="betreuer" rows="3" placeholder="Enter Betreuer names (one per line)"><?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['betreuer']) : '' ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Redaktionsmitglieder:</label>
                        <textarea name="redaktionsmitglieder" rows="4" placeholder="Enter Redaktionsmitglieder names (one per line)"><?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['redaktionsmitglieder']) : '' ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Studentische Leitung:</label>
                        <textarea name="studentische_leitung" rows="3" placeholder="Enter Studentische Leitung names (one per line)"><?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['studentische_leitung']) : '' ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Additional Text (e.g., Gründer):</label>
                        <textarea name="additional_text" rows="3" placeholder="Enter additional text with names"><?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['additional_text']) : '' ?></textarea>
                        <small>Format: "Title: Name - Info, Name - Info"</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Team Photos:</label>
                        <input type="file" name="team_photos[]" multiple accept="image/*">
                        <small>Upload multiple images for carousel. Images will be saved in Mitglieder/ folder.</small>
                    </div>
                    
                    <?php if (isset($edit_member_post) && $edit_member_post && !empty($edit_member_post['photos'])): ?>
                        <div class="current-images">
                            <strong>Current Photos:</strong><br>
                            <?php 
                            $photos = json_decode($edit_member_post['photos'], true);
                            if (is_array($photos)):
                                foreach ($photos as $photo): ?>
                                    <div style="display: inline-block; margin: 5px;">
                                        <img src="<?= htmlspecialchars($photo) ?>" alt="Team photo" style="max-width: 100px;">
                                        <br>
                                        <small><?= basename($photo) ?></small>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Financing Text:</label>
                        <textarea name="financing_text" rows="2"><?= (isset($edit_member_post) && $edit_member_post) ? htmlspecialchars($edit_member_post['financing_text']) : 'In Zusammenarbeit mit der Banater Zeitung (Chefredakteur Siegfried Thiel) und mit technischer Unterstützung von der ADZ. Finanzierung der Druckversion: Demokratisches Forum der Deutschen im Banat.' ?></textarea>
                    </div>
                    
                    <?php if (isset($edit_member_post) && $edit_member_post): ?>
                        <button type="submit" name="update_member_post">Update Team Post</button>
                        <a href="?" class="cancel-btn" style="text-decoration: none; display: inline-block;">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="add_member_post">Add Team Post</button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="section">
                <h2>Current Team Year Posts</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Year</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($member_posts as $post): ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= htmlspecialchars($post['year']) ?></td>
                        <td><?= htmlspecialchars($post['title']) ?></td>
                        <td>
                            <a href="?edit_member_post=<?= $post['id'] ?>#members" class="edit-btn" style="text-decoration: none; display: inline-block;">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="member_post_id" value="<?= $post['id'] ?>">
                                <button type="submit" name="delete_member_post" onclick="return confirm('Delete this team year post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <!-- Lesekreis Tab -->
        <div id="lesekreis" class="tab-content">
            <div class="section">
                <h2><?= (isset($edit_lesekreis) && $edit_lesekreis) ? 'Edit Lesekreis Post' : 'Add New Lesekreis Post' ?></h2>
                <form method="POST" enctype="multipart/form-data">
                    <?php if (isset($edit_lesekreis) && $edit_lesekreis): ?>
                        <input type="hidden" name="lesekreis_id" value="<?= $edit_lesekreis['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" name="date" value="<?= (isset($edit_lesekreis) && $edit_lesekreis) ? $edit_lesekreis['date'] : '' ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" value="<?= (isset($edit_lesekreis) && $edit_lesekreis) ? htmlspecialchars($edit_lesekreis['title']) : '' ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" rows="5" required><?= (isset($edit_lesekreis) && $edit_lesekreis) ? htmlspecialchars($edit_lesekreis['description']) : '' ?></textarea>
                    </div>
                    
                    <?php if (isset($edit_lesekreis) && $edit_lesekreis && !empty($edit_lesekreis['image_paths'])): ?>
                        <div class="current-images">
                            <strong>Current Images:</strong><br>
                            <?php 
                            $images = json_decode($edit_lesekreis['image_paths'], true);
                            if (is_array($images)):
                                foreach ($images as $image): ?>
                                    <div style="display: inline-block; margin: 5px;">
                                        <img src="<?= htmlspecialchars($image) ?>" alt="Lesekreis image" style="max-width: 100px;">
                                        <br>
                                        <small><?= basename($image) ?></small>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label>New Images (optional):</label>
                        <input type="file" name="images[]" multiple accept="image/*">
                    </div>
                    
                    <?php if (isset($edit_lesekreis) && $edit_lesekreis): ?>
                        <button type="submit" name="update_lesekreis">Update Lesekreis Post</button>
                        <a href="?" class="cancel-btn" style="text-decoration: none; display: inline-block;">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="add_lesekreis">Add Lesekreis Post</button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="section">
                <h2>Current Lesekreis Posts</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($lesekreis_posts as $post): ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['date'] ?></td>
                        <td><?= htmlspecialchars($post['title']) ?></td>
                        <td>
                            <a href="?edit_lesekreis=<?= $post['id'] ?>#lesekreis" class="edit-btn" style="text-decoration: none; display: inline-block;">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="lesekreis_id" value="<?= $post['id'] ?>">
                                <button type="submit" name="delete_lesekreis" onclick="return confirm('Delete this Lesekreis post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected tab content
            document.getElementById(tabName).classList.add('active');
            
            // Activate selected tab
            event.target.classList.add('active');
        }

        // Show the correct tab if URL has hash
        window.addEventListener('load', function() {
            const hash = window.location.hash.substring(1);
            if (hash && ['events', 'issues', 'press', 'members', 'lesekreis'].includes(hash)) {
                showTab(hash);
            }
        });
    </script>
</body>
</html>