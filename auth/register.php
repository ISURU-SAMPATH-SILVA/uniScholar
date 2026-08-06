<!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <div class="Login-card">
        <!-- Logo Area -->
        <div class="Login-avatar-box">
            <img src="../img/Brand/Favicon-White.svg" alt="">
        </div>
        <h1 class="Login-brand-name">uniScholar</h1>
        <h2 class="Login-form-title">REGISTER</h2>

        <!-- Register Form -->
        <form action="#">
            <!-- First & Last Name side-by-side -->
            <div class="row">
                <div class="Login-input-group">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" placeholder="John" required>
                </div>
                <div class="Login-input-group">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" placeholder="Doe" required>
                </div>
            </div>

            <div class="Login-input-group">
                <label for="reg-email">Email Address</label>
                <input type="email" id="reg-email" placeholder="username@gmail.com" required>
            </div>

            <div class="Login-input-group">
                <label for="reg-pass">Password</label>
                <input type="password" id="reg-pass" placeholder="••••••••" required>
            </div>

            <div class="Login-input-group">
                <label for="confirm-pass">Confirm Password</label>
                <input type="password" id="confirm-pass" placeholder="••••••••" required>
            </div>

            <button type="submit" class="Login-btn Login-btn-primary">Register</button>

            <button type="button" class="Login-btn btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                Login With Google
            </button>
        </form>

        <p class="Login-footer-text">
            Already have an account? <a href="/uniScholar/components/Login.php">Login</a>
        </p>
    </div>
</body>

</html>