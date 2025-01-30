<?php
include_once('connect.php');

// Check if a session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");  
    exit();
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];

$query = "SELECT email FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $email = $user['email']; 
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body> 
    <header>
        <h1>FlowFocus</h1>
        <p>Lajmet e fundit vetem tek ne !</p>
    </header>

    <section class="kategorit">
        <article id="art5">
            <h2>Eksploroj Kategorit</h2>
                <button id="contactButton"><a href="index.php">Home</a></button>
                <br>
                <button id="contactButton"><a href="about.php">About Us</a></button>
                <br>
                <button id="contactButton"><a href="login.php?logout=true">Logout</a></button>
                <br>
                <button id="contactButton"><a href="profile.php">Profile</a></button>
                <br>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <button id="contactButton"><a href="dashboard.php">Admin Dashboard</a></button>
                <?php endif; ?>
        </article>
        <article id="art6">
        <div id="lajmi1"><a href="faqja1.php" class="faqet"><img src="image3.jpg" alt="Image1" id="fotolajmi1"><h6 id="titujt">Granit Xhaka nenshkruan me Bayer Leverkusen</h6></a></div>
        <div id="lajmi2"><a href="faqja2.php" class="faqet"><img src="image4.jpg" alt="Image2" id="fotolajmi2"><h6 id="titujt">TikTok-ut i ndalohetperdorimi ne USA</h6></a></div>
        <div id="lajmi3"><a href="faqja3.php" class="faqet"><img src="image5.jpg" alt="Image3" id="fotolajmi3"><h6 id="titujt">Donald Trump lanson kriptomonedhen e tij $Trump</h6></a></div>
        <div id="lajmi4"><a href="faqja4.php" class="faqet"><img src="image6.jpg" alt="Image4" id="fotolajmi4"><h6 id="titujt">Lojtari i Manchester United kalon ne Real Betis</h6></a></div>
        </article>
    </section>

    <footer class="footer">
        <h4>Rreth nesh !</h4>
        <p>Na ndiq ne keto platforma</p>
        <div class="logo">
            <a href="https://www.facebook.com" target="_blank" class="logot"><img src="fblogo.png" alt="img1" id="fblogo"></a>
            <a href="https://www.instagram.com" target="_blank" class="logot"><img src="iglogo.jfif" alt="img1" id="iglogo"></a>
            <a href="https://www.linkedin.com" target="_blank" class="logot"><img src="lilogo.png" alt="img1" id="lilogo"></a>
        </div>
    </footer>
</body>
</html>
