<?php
include_once('connect.php');

// Check if a session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

$query = "SELECT page_name FROM saved_pages WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$saved_pages = [];
while ($row = $result->fetch_assoc()) {
    $saved_pages[] = $row;
}

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_page'])) {
    $page_name_to_remove = $_POST['page_name'];

    $query = "DELETE FROM saved_pages WHERE user_id = ? AND page_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $user_id, $page_name_to_remove);
    $stmt->execute();
    $stmt->close();

    header("Location: profile.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
</head>
<body>
    <h1>Welcome to Your Profile</h1>
    <button id="contactButton"><a href="index.php">Home</a></button>

    <?php if (!empty($saved_pages)): ?>
        <h2>Your Saved Pages</h2>
        <div class="slider">
            <?php foreach ($saved_pages as $page): ?>
                <div class="slide">
                    <a href="<?= htmlspecialchars($page['page_name']) ?>">
                        <?= htmlspecialchars($page['page_name']) ?>
                    </a>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="page_name" value="<?= htmlspecialchars($page['page_name']) ?>">
                        <button type="submit" name="remove_page" id="removeButton">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No pages saved yet.</p>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        });
    </script>
</body>
</html>
