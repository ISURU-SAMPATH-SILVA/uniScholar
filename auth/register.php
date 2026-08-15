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

        <!-- Logo -->
        <div class="Login-avatar-box">
            <img
                src="../img/Brand/Favicon-White.svg"
                alt="uniScholar Logo"
            >
        </div>

        <h1 class="Login-brand-name">
            uniScholar
        </h1>

        <h2 class="Login-form-title">
            REGISTER
        </h2>


        <!-- Register Form -->
        <form
            action="../database/register.php"
            method="POST"
        >

            <!-- First Name + Last Name -->
            <div class="row">

                <div class="Login-input-group">

                    <label for="fname">
                        First Name
                    </label>

                    <input
                        type="text"
                        id="fname"
                        name="fname"
                        placeholder="John"
                        autocomplete="given-name"
                        required
                    >

                </div>


                <div class="Login-input-group">

                    <label for="lname">
                        Last Name
                    </label>

                    <input
                        type="text"
                        id="lname"
                        name="lname"
                        placeholder="Doe"
                        autocomplete="family-name"
                        required
                    >

                </div>

            </div>


            <!-- Email -->
            <div class="Login-input-group">

                <label for="reg-email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="reg-email"
                    name="email"
                    placeholder="username@gmail.com"
                    autocomplete="email"
                    required
                >

            </div>


            <!-- Password -->
            <div class="Login-input-group">

                <label for="reg-pass">
                    Password
                </label>

                <input
                    type="password"
                    id="reg-pass"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="new-password"
                    minlength="6"
                    required
                >

            </div>


            <!-- Confirm Password -->
            <div class="Login-input-group">

                <label for="confirm-pass">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="confirm-pass"
                    name="confirm_password"
                    placeholder="••••••••"
                    autocomplete="new-password"
                    minlength="6"
                    required
                >

            </div>


            <!-- Register Button -->
            <button
                type="submit"
                class="Login-btn Login-btn-primary"
                name="NEXT"
                value="NEXT"
            >
                NEXT
            </button>

        </form>


        <!-- Login Link -->
        <p class="Login-footer-text">

            Already have an account?

            <a href="Login.php">
                Login
            </a>

        </p>

    </div>

</body>

</html>