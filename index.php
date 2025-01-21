<?php

$title = "Welcome to Our Website!";
$aboutText = "This is the About Us section.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
   
    <header id="head1">
        <div id="T9">
            <h1>Our Website</h1>
        </div>
    </header>

   
    <section id="sec3">
        <h2 id="T10">About Us</h2>
        <p id="T11"><?php echo $aboutText; ?></p>
        <a href="about.php" id="AboutUsButton">Learn More</a>
    </section>

   
    <section id="sec4">
        <h2 id="T12">Our Products</h2>
        <p id="T13">Check out our amazing products below!</p>
    </section>

    
    <section id="sec5">
        <h2 id="T14">Contact Us</h2>
        <p id="T15">Feel free to reach out anytime.</p>
    </section>
</body>
</html>
