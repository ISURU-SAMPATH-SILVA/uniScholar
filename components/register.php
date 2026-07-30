<!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uniScholar - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="card">
        <!-- Logo Area -->
        <div class="avatar-box"></div>
        <h1 class="brand-name">uniScholar</h1>
        <h2 class="form-title">REGISTER</h2>

        <!-- Register Form -->
        <form action="#">
            <!-- First & Last Name side-by-side -->
            <div class="row">
                <div class="input-group">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" placeholder="John" required>
                </div>
                <div class="input-group">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" placeholder="Doe" required>
                </div>
            </div>

            <div class="input-group">
                <label for="reg-email">Email Address</label>
                <input type="email" id="reg-email" placeholder="username@gmail.com" required>
            </div>

            <div class="input-group">
                <label for="reg-pass">Password</label>
                <input type="password" id="reg-pass" placeholder="••••••••" required>
            </div>

            <div class="input-group">
                <label for="confirm-pass">Confirm Password</label>
                <input type="password" id="confirm-pass" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>

            <button type="button" class="btn btn-google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                Login With Google
            </button>
        </form>

        <p class="footer-text">
            Already have an account? <a href="login.html">Login</a>
        </p>
    </div>
</body>

</html>