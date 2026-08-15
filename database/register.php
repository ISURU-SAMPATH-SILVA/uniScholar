<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request.");
}

$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

/* Check required fields */

if (
    empty($fname) ||
    empty($lname) ||
    empty($email) ||
    empty($password) ||
    empty($confirm_password)
) {
    die("All fields are required.");
}

/* Check passwords */

if ($password !== $confirm_password) {
    die("Passwords do not match!");
}

/* Check email already exists */

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

/* Hash password */

$hashed_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);

/* Insert user */

$sql = "INSERT INTO users
        (fname, lname, email, password, role)
        VALUES (?, ?, ?, ?, 'user')";

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

    /* Get newly created user ID */

    $user_id = $conn->insert_id;

    /* Save user ID in session */

    $_SESSION["user_id"] = $user_id;

    /* Save basic details */

    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $_SESSION["email"] = $email;
    $_SESSION["role"] = "user";

    /* Go to university registration */

    header("Location: ../auth/registration_university.php");
    exit();

} else {

    die("Error: " . $stmt->error);

}

$check_stmt->close();
$stmt->close();
$conn->close();

?>