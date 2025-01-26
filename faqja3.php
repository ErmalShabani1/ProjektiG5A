<?php
include_once('connect.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['page_name'])) {
    $page_name = "faqja3.php";


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
	<title>Donald Trump lanson kriptovaluten e tij</title>
	<link rel="stylesheet" href="lajmet.css">
</head>
<body>
	<header id="head1">
		<button id="LajmetButton"><a href="index.php">Home</a></button>
        <h1 id="T1">Rreth Focus Flow !</h1>
    </header>
        <section id="sec1">
            <h2 id="T2">Donald Trump lanson kriptomonedhen $Trump</h2>
            <p id="T3"><img src="image5.jpg" id="image1"> <br>Donald Trump ka lançuar një kriptovalutë të re të quajtur $TRUMP. Kjo monedhë meme u prezantua më 17 janar 2025, disa ditë para inaugurimit të tij si president i Shteteve të Bashkuara. Në fillim, çmimi i $TRUMP u rrit me më shumë se 300% brenda një nate, duke arritur një vlerë tregu prej mbi 27 miliardë dollarësh. Pas lançimit të $MELANIA, një tjetër kriptovalutë e krijuar nga Melania Trump, vlera e $TRUMP ka pësuar rënie.   </p>
            
            <form method="POST" action="">
                <input type="hidden" name="page_name" value="faqja3.html">
                <input type="submit" value="Save to Profile"> 
            </form>


                <?php if ($message): ?>
                    <p><?php echo $message; ?></p>
                <?php endif; ?>

        </section>
        
        
    <footer>
        <p id="T18">© 2024 Our Company. All rights reserved.</p>
    </footer>
    <script src="lajmet.js"></script>

</body>
</html>