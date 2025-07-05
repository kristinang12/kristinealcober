<?php
include 'config.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $message = "<span class='success'>✅ Registration successful! <a href='login.php'>Login here</a></span>";
    } else {
        $message = "<span class='error'>❌ Error: " . htmlspecialchars($stmt->error) . "</span>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kristine Alcober | Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="landing-page">
    <nav class="navbar">
        <div class="navbar-header">
            <img src="img/id.svg" alt="Logo">
            <h1>Kristine Alcober</h1>
        </div>
        <div class="navbar-list">
            <ul>
                <li><a href="index.html"><img src="img/navbar-menu/home-icon.png">Home</a></li>
                <li><a href="about.html"><img src="img/navbar-menu/about-icon.png">About</a></li>
                <li><a href="portfolio.html"><img src="img/navbar-menu/portfolio-icon.png">Portfolio</a></li>
                <li><a href="services.html"><img src="img/navbar-menu/services-icon.png">Services</a></li>
                <li><a href="contact.html"><img src="img/navbar-menu/contact-icon.png">Contact</a></li>
            </ul>
        </div>
    </nav>
</section>

<div class="sideline"></div>

<section class="login-section">
    <div class="login-header">
        <h1>Join Now!</h1>
    </div>

    <div class="loginform">


        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required placeholder="Email">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="Password">
            
            <button type="submit">Register</button>
        </form>

       
    </div>

     <div class="try-login">
            Already have an account? <a href="login.php">Login here</a>
        </div>
</section>

</body>
</html>
