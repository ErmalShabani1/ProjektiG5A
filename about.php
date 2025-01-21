<?php

$aboutText = "This is the About Us section where you can learn more about our company.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    
    <header id="head1">
        <div id="T9">
            <h1>About Us</h1>
        </div>
    </header>

    
    <section id="sec3">
        <h2 id="T10">About Our Company</h2>
        <p id="T11"><?php echo $aboutText; ?></p>
    </section>

    
    <section id="sec5">
        <h2 id="T14">Contact Us</h2>
        <p id="T15">Feel free to reach out anytime.</p>
    </section>
</body>
</html>
