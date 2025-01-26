<?php
include_once('connect.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['page_name'])) {
    $page_name = "faqja4.php";


    $query = "INSERT INTO saved_pages (user_id, page_name) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("is", $user_id, $page_name);
    

    $stmt->execute();


    if ($stmt->affected_rows > 0) {
        $message = "Page saved to your profile successfully!";
    } else {
        $message = "Error saving page to your profile.";
    }

    $stmt->close();
} else {
    $message = ''; 
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lojtari i Manchester United kalon tek Real Betis</title>
    <link rel="stylesheet" href="lajmet.css">
</head>
<body>
    <header id="head1">
        <button id="LajmetButton"><a href="index.php">Home</a></button>
        <h1 id="T1">Rreth Focus Flow !</h1>
    </header>
    <section id="sec1">
        <h2 id="T2">Lojtari i Manchester United, Antony huazohet tek Real Betis</h2>
        <p id="T3">
            <img src="image6.jpg" id="image1"> 
            <br>Antony, sulmuesi i Manchester United, është afër një marrëveshjeje huazimi te Real Betis deri në fund të sezonit 2024-2025. 
            Raportet sugjerojnë se marrëveshja është në fazë të avancuar dhe pritet të finalizohet së shpejti. 
            Nëse huazimi te Real Betis finalizohet, kjo mund të ofrojë mundësi të reja për Antony për të rikthyer formën e tij dhe për të kontribuar në betejen e Real Betis ne Spanje. 
        </p>

        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="hidden" name="page_name" value="faqja4.html">
            <input type="submit" value="Save to Profile">
        </form>

    </section>
    <footer>
        <p id="T18">© 2024 Our Company. All rights reserved.</p>
    </footer>
</body>
</html>
