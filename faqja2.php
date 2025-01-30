<?php
include_once('connect.php');

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['page_name'])) {
    $page_name = "faqja2.php";

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
	<title>TikTok ndalohet ne USA</title>
	<link rel="stylesheet" href="lajmet.css">
</head>
<body>
	<header id="head1">
		<button id="LajmetButton"><a href="index.php">Home</a></button>
        <h1 id="T1">Rreth Focus Flow !</h1>
    </header>
	<section id="sec1">
		<h2 id="T2">TikTok ndalohet ne USA</h2>
		<p id="T3"><img src="image4.jpg" id="image1"> <br>TikTok është ndaluar në disa shtete të SHBA-së për shkak të shqetësimeve mbi sigurinë kombëtare dhe mbrojtjen e të dhënave personale. Në dhjetor 2022, Senati i SHBA-së miratoi një ligj që ndalon përdorimin e TikTok në pajisjet e qeverisë federale. Gjithashtu, disa shtete kanë ndaluar përdorimin e TikTok në pajisjet e qeverisë shtetërore.  </p>
		
		<form method="POST" action="">
			<input type="hidden" name="page_name" value="faqja2.html">
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