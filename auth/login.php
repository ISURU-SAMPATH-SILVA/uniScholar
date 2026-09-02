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

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Font Awesome icons සඳහා link එක -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .password-container {
            position: relative;
            width: 300px;
        }

        .password-container input {
            width: 100%;
            padding: 10px 40px 10px 10px; /* දකුණු පසින් icon එකට ඉඩ තැබීමට */
            box-sizing: border-box;
        }

        .toggle-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }
    </style>
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
    <div class="password-container">
        <input type="password" id="passwordInput" placeholder="Password">
        <i class="fa-solid fa-eye toggle-icon" id="togglePassword"></i>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#passwordInput');

        togglePassword.addEventListener('click', function () {
            // type එක text සහ password අතර වෙනස් කිරීම
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Icon එක (ඇස ඇරලා / වහලා) වෙනස් කිරීම
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>