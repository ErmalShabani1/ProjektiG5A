<?php
include_once('connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_page'])) {
    $page_name_to_delete = $_POST['page_name'];

    $query = "DELETE FROM saved_pages WHERE page_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $page_name_to_delete);
    $stmt->execute();
    $stmt->close();
    
    header("Location: dashboard.php");
    exit();
}

$query = "SELECT page_name, COUNT(user_id) AS user_count FROM saved_pages GROUP BY page_name HAVING user_count > 0";
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
            <button id="logoutButton"><a href="logout.php">Logout</a></button>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($saved_pages_stats as $page_stat): ?>
                        <tr>
                            <td><?= htmlspecialchars($page_stat['page_name']) ?></td>
                            <td><?= htmlspecialchars($page_stat['user_count']) ?></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="page_name" value="<?= htmlspecialchars($page_stat['page_name']) ?>">
                                    <button type="submit" name="delete_page" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 5px;">Delete</button>
                                </form>
                            </td>
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