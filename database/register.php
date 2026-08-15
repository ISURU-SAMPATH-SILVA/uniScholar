<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if (isset($_POST['NEXT'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check passwords
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Check email already exists
    $check_sql = "SELECT id FROM users WHERE email = ?";

    $check_stmt = $conn->prepare($check_sql);

    if (!$check_stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();

    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        die("Email already registered!");
    }

    // Hash password
    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    // Insert user
    $sql = "INSERT INTO users
            (fname, lname, email, password)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssss",
        $fname,
        $lname,
        $email,
        $hashed_password
    );

    if ($stmt->execute()) {

        // Get newly created user ID
        $user_id = $conn->insert_id;

        // Save user ID in session
        $_SESSION["user_id"] = $user_id;

        // Go to university registration page
        header("Location: ../auth/registration_university.php");
        exit();

    } else {

        echo "Error: " . $stmt->error;

    }

    $check_stmt->close();
    $stmt->close();
    $conn->close();
}

?>