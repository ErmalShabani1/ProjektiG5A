<?php
include_once('connect.php');

// Check if a session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
    header("Location: adminlogin.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: adminlogin.php");
    exit();
}

$query = "SELECT page_name, COUNT(user_id) AS user_count FROM saved_pages GROUP BY page_name";
$result = $conn->query($query);

$saved_pages_stats = [];
while ($row = $result->fetch_assoc()) {
    $saved_pages_stats[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <div class="nav-buttons">
            <button id="homeButton"><a href="index.php">Home</a></button>
            <button id="logoutButton"><a href="dashboard.php?logout=true">Logout</a></button>
        </div>
    </header>

    <section class="stats">
        <h2>Page Stats</h2>
        <?php if (!empty($saved_pages_stats)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Page Name</th>
                        <th>Users Saved</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($saved_pages_stats as $page_stat): ?>
                        <tr>
                            <td><?= htmlspecialchars($page_stat['page_name']) ?></td>
                            <td><?= htmlspecialchars($page_stat['user_count']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No pages saved by users yet.</p>
        <?php endif; ?>
    </section>
</body>
</html>
