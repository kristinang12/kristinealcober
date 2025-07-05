<?php
include 'config.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Success
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;
            header("Location: welcome.php");
            exit();
        } else {
            $error = "❌ Incorrect password.";
        }
    } else {
        $error = "❌ No account found with that email.";
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
            <h2>Login now</h2>
            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="Email"><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required placeholder="Password"><br><br>
            
            <button type="submit">Login</button>

            <?php if (!empty($error)) : ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>

       
    </div>

     
</section>

</body>
</html>
