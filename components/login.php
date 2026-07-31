<!DOCTYPE html>
<html lang="si">

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
        <!-- Logo Area -->
        <div class="Login-avatar-box">
            <img src="../img/Brand/Favicon-White.svg" alt="uniScholar Logo" class="Login-avatar">
        </div>
        <h1 class="Login-brand-name">uniScholar</h1>
        <h2 class="Login-form-title">LOGIN</h2>

        <!-- Login Form -->
        <form action="#">
            <div class="Login-input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" placeholder="username@email.com" required>
                <a href="#" class="forgot-link">Forgot Email?</a>
            </div>

            <div class="Login-input-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="••••••••••••" required>
                <a href="#" class="forgot-link">Forgot Password?</a>
            </div>

            <button type="submit" class="Login-btn Login-btn-primary">SUBMIT</button>

            <button type="button" class="Login-btn btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                Login With Google
            </button>
        </form>

        <p class="Login-footer-text">
            Don't have an account? <a href="register.php">Register</a>
        </p>
    </div>
</body>

</html>