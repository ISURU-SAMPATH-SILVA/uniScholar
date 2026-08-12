<!DOCTYPE html>
<html lang="si">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="icon"
        type="image/svg+xml"
        href="../img/Brand/Favicon.svg"
    >

    <title>uniScholar - Forgot Password</title>

    <link
        rel="stylesheet"
        href="../css/bootstrap.min.css"
    >

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

    <script
        src="../js/bootstrap.bundle.min.js"
        defer
    ></script>

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
            RESET PASSWORD
        </h2>


        <p class="Login-footer-text">
            Enter your registered email address
            to reset your password.
        </p>


    <form
    action="../database/ForgotPassword.php"
    method="POST"
>
            <div class="Login-input-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="username@gmail.com"
                    required
                >

            </div>


            <div class="Login-input-group">

                <label for="new_password">
                    New Password
                </label>

                <input
                    type="password"
                    id="new_password"
                    name="new_password"
                    placeholder="*****"
                    minlength="8"
                    required
                >

            </div>


            <div class="Login-input-group">

                <label for="confirm_password">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="*****"
                    minlength="8"
                    required
                >

            </div>


            <button
                type="submit"
                name="reset_password"
                value="reset"
                class="Login-btn Login-btn-primary"
            >
                RESET PASSWORD
            </button>

        </form>


        <p class="Login-footer-text">

            Remember your password?

            <a href="Login.php">
                Login
            </a>

        </p>

    </div>

</body>

</html>