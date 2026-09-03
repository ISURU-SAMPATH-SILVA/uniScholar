<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Register</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="Login-card">

        <!-- Logo -->
        <div class="Login-avatar-box">
            <img src="../img/Brand/Favicon-White.svg" alt="uniScholar Logo">
        </div>

        <h1 class="Login-brand-name">uniScholar</h1>
        <h2 class="Login-form-title">REGISTER</h2>

        <!-- Register Form -->
        <form action="../database/register.php" method="POST">

            <!-- First Name + Last Name -->
            <div class="row">
                <div class="Login-input-group">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="John" autocomplete="given-name" required>
                </div>

                <div class="Login-input-group">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" placeholder="Doe" autocomplete="family-name" required>
                </div>
            </div>

            <!-- Email -->
            <div class="Login-input-group">
                <label for="reg-email">Email Address</label>
                <input type="email" id="reg-email" name="email" placeholder="username@gmail.com" autocomplete="email" required>
            </div>

            <!-- Password -->
            <div class="Login-input-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fa-solid fa-eye toggle-password" data-target="password"></i>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="Login-input-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="password-wrapper">
                    <!-- මෙතැන name="confirm_password" සහ id="confirm_password" ලෙස වෙනස් කර ඇත -->
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <i class="fa-solid fa-eye toggle-password" data-target="confirm_password"></i>
                </div>
            </div>

            <!-- Register Button -->
            <button type="submit" class="Login-btn Login-btn-primary" name="NEXT" value="NEXT">
                NEXT
            </button>

        </form>

        <!-- Login Link -->
        <p class="Login-footer-text">
            Already have an account?
            <a href="Login.php">Login</a>
        </p>

    </div>

    <!-- Multi-field toggle පහසුකම සහිත JS Code එක -->
    <script>
        const toggleIcons = document.querySelectorAll('.toggle-password');

        toggleIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);

                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

</body>

</html>