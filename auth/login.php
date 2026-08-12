<?php

if (
    isset($_GET['reset']) &&
    $_GET['reset'] === 'success'
) {

    echo '
        <div class="alert alert-success">
            Password reset successfully.
            Please login with your new password.
        </div>
    ';

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>

</head>

<body>
    <div class="Login-card">
        <!-- logo  -->
        <div class="Login-avatar-box">
            <img src="../img/Brand/Favicon-White.svg" alt="uniScholar Logo" class="Login-avatar">
        </div>
        <h1 class="Login-brand-name">uniScholar</h1>
        <h2 class="Login-form-title">LOGIN</h2>

        <!--  form -->
       <form action="../database/login.php" method="POST">
            <div class="Login-input-group">

    <label for="email">Email Address</label>

    <input
        type="email"
        id="email"
        name="email"
        placeholder="username@gmail.com"
        autocomplete="email"
        required
    >

</div>
<div class="Login-input-group">

    <label for="password">Password</label>

    <input
        type="password"
        id="password"
        name="password"
        placeholder="******"
        autocomplete="current-password"
        required
    >

    <a href="ForgotPassword.php" class="forgot-link">
        Forgot Password?
    </a>

</div>

           <button
    type="submit"
    class="Login-btn Login-btn-primary"
    name="login"
>
    SUBMIT
</button>
          
        </form>

        <p class="Login-footer-text">
            Don't have an account? <a href="register.php">Register</a>
        </p>
    </div>
</body>

</html>