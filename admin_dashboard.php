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
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $filename = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                        $target_path = "uploads/events/" . $filename;
                        
                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $image_paths[] = "/" . $target_path;
                        }
                    }
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO events (date, title, description, image_paths) VALUES (?, ?, ?, ?)");
            $stmt->execute([$date, $title, $description, json_encode($image_paths)]);
            $message = "Event added successfully!";
            
        } elseif (isset($_POST['add_issue'])) {
            // Add new issue
            $title = $_POST['issue_title'];
            $description = $_POST['issue_description'];
            
            // Handle PDF upload
            $pdf_path = '';
            if (!empty($_FILES['pdf']['name'])) {
                $filename = uniqid() . '_' . basename($_FILES['pdf']['name']);
                $target_path = "uploads/issues/" . $filename;
                
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target_path)) {
                    $pdf_path = "/" . $target_path;
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO issues (title, description, pdf_path) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $pdf_path]);
            $message = "Issue added successfully!";
            
        } elseif (isset($_POST['add_press'])) {
            // Add new press mention
            $source = $_POST['press_source'];
            $title = $_POST['press_title'];
            $url = $_POST['press_url'];
            
            $stmt = $pdo->prepare("INSERT INTO press (source, title, url) VALUES (?, ?, ?)");
            $stmt->execute([$source, $title, $url]);
            $message = "Press mention added successfully!";
            
        } elseif (isset($_POST['add_member'])) {
            // Add new member
            $name = $_POST['member_name'];
            $role = $_POST['member_role'];
            $year = $_POST['member_year'];
            $team_year = $_POST['member_team_year'];
            
            $stmt = $pdo->prepare("INSERT INTO members (name, role, year, team_year) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $role, $year, $team_year]);
            $message = "Member added successfully!";
            
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
            
        } elseif (isset($_POST['delete_member'])) {
            // Delete member
            $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
            $stmt->execute([$_POST['member_id']]);
            $message = "Member deleted successfully!";
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Get current data
$events = $pdo->query("SELECT * FROM events ORDER BY date DESC")->fetchAll();
$issues = $pdo->query("SELECT * FROM issues ORDER BY id DESC")->fetchAll();
$press_mentions = $pdo->query("SELECT * FROM press ORDER BY id")->fetchAll();
$members = $pdo->query("SELECT * FROM members ORDER BY team_year, name")->fetchAll();
$team_years = $pdo->query("SELECT DISTINCT team_year FROM members WHERE team_year IS NOT NULL ORDER BY team_year DESC")->fetchAll(PDO::FETCH_COLUMN);
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
        </div>

        <!-- Events Tab -->
        <div id="events" class="tab-content active">
            <div class="section">
                <h2>Add New Event</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Images:</label>
                        <input type="file" name="images[]" multiple accept="image/*">
                    </div>
                    <button type="submit" name="add_event">Add Event</button>
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
                <h2>Add New Issue</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="issue_title" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="issue_description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>PDF File:</label>
                        <input type="file" name="pdf" accept=".pdf" required>
                    </div>
                    <button type="submit" name="add_issue">Add Issue</button>
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
                <h2>Add New Press Mention</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Source:</label>
                        <input type="text" name="press_source" required>
                    </div>
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="press_title" required>
                    </div>
                    <div class="form-group">
                        <label>URL:</label>
                        <input type="url" name="press_url" required>
                    </div>
                    <button type="submit" name="add_press">Add Press Mention</button>
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
                <h2>Add New Member</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="member_name" required>
                    </div>
                    <div class="form-group">
                        <label>Role:</label>
                        <input type="text" name="member_role" required>
                    </div>
                    <div class="form-group">
                        <label>Year/Study Info:</label>
                        <input type="text" name="member_year">
                    </div>
                    <div class="form-group">
                        <label>Team Year:</label>
                        <select name="member_team_year" required>
                            <option value="">Select Team Year</option>
                            <?php foreach ($team_years as $year): ?>
                                <option value="<?= $year ?>"><?= $year ?></option>
                            <?php endforeach; ?>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                    <button type="submit" name="add_member">Add Member</button>
                </form>
            </div>

            <div class="section">
                <h2>Current Members</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Year</th>
                        <th>Team Year</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= $member['id'] ?></td>
                        <td><?= htmlspecialchars($member['name']) ?></td>
                        <td><?= htmlspecialchars($member['role']) ?></td>
                        <td><?= htmlspecialchars($member['year']) ?></td>
                        <td><?= htmlspecialchars($member['team_year']) ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="member_id" value="<?= $member['id'] ?>">
                                <button type="submit" name="delete_member" onclick="return confirm('Delete this member?')">Delete</button>
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
    </script>
</body>
</html>