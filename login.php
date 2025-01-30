<?php
include_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Ju lutem plotësoni të gjitha fushat.');</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (!empty($user['password'])) {
            // Directly compare plain-text passwords
            if ($password === $user['password']) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect to index.php after successful login
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Fjalëkalimi i pasaktë.');</script>";
            }
        } else {
            echo "<script>alert('Fjalëkalimi nuk është i vlefshëm.');</script>";
        }
    } else {
        echo "<script>alert('Ky përdorues nuk ekziston.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header id="loginheader">
        <h1 id="T4">Mirë se erdhët!</h1>
        <h2 id="T5">Ju lutem Log In</h2>
        <button id="HomeButton"><a href="index.php">Home</a></button>
    </header>
    <div class="pjesalogin2">
        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <form action="login.php" method="POST" id="logform">
                <input type="text" name="username" placeholder="Emri" required id="logintext">
                <input type="password" name="password" placeholder="Fjalkalimi" required id="logintext">
                <input type="submit" name="login" value="Kyqu" id="loginbutton">
                <a href="register.php" type="button" id="SignUp">S'ke llogari? Krijo</a>
            </form> 
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
    <hr>
    <div id="art2">
        <a href="https://www.facebook.com" target="_blank"> <img src="fblogo.png" alt="img1" id="fblogo"></a>
        <a href="https://www.instagram.com" target="_blank"> <img src="iglogo.jfif" alt="img2" id="iglogo"></a>
        <a href="https://www.linkedin.com" target="_blank"> <img src="lilogo.png" alt="img3" id="lilogo"></a>
    </div>
    <h3 id="T8">Faleminderit</h3>
    <hr>
</body>
</html>