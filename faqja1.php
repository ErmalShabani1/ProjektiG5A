<?php
include_once('connect.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}


$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['page_name'])) {
    $page_name = "faqja1.php";

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
	<title>Granit Xhaka nenshkruan me Bayer Leverkusen</title>
	<link rel="stylesheet" href="lajmet.css">
</head>
<body>
	<header id="head1">
		<button id="LajmetButton"><a href="index.php">Home</a></button>
        <h1 id="T1">Rreth Focus Flow !</h1>
    </header>
        <section id="sec1">
            <h2 id="T2">Granit Xhaka nenshkruan me Bayer Leverkusen</h2>
            <p id="T3"><img src="image3.jpg" id="image1"> <br> Lojtari i kombëtares zvicerane Granit Xhaka kaloj nga ekipi gjigand anglez Arsenal ne Gjermani tek Bayer Leverkusen per 21.4 Milion £. Zvicerani nenshkroi marrveshje per 5 vite. Në nivel kombëtar, Xhaka ka vazhduar të jetë një figurë udhëheqëse për Zvicrën. Ai udhëhoqi ekipin në çerekfinalet e Kampionatit Evropian 2024 në Gjermani dhe u shpall futbollisti i vitit në Zvicër për herë të tretë radhazi. </p>
            <form method="POST" action="">
                <input type="hidden" name="page_name" value="faqja1.html">
                <input type="submit" value="Save to Profile"> 
            </form>

                <?php if ($message): ?>
                    <p><?php echo $message; ?></p>
                <?php endif; ?>
        </section>
    <footer>
        <p id="T18">© 2024 Our Company. All rights reserved.</p>
    </footer>
</body>
</html>