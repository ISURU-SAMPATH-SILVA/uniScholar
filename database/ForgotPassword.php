<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    die("Invalid request");

}


$email = trim($_POST['email'] ?? '');

$new_password = $_POST['new_password'] ?? '';

$confirm_password = $_POST['confirm_password'] ?? '';


// Check empty fields
if (
    empty($email) ||
    empty($new_password) ||
    empty($confirm_password)
) {

    die("All fields are required");

}


// Check passwords
if ($new_password !== $confirm_password) {

    die("Passwords do not match");

}


// Check password length
if (strlen($new_password) < 8) {

    die("Password must be at least 8 characters");

}


// Check email
$sql = "SELECT id
        FROM users
        WHERE email = ?";


$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "s",
    $email
);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows !== 1) {

    die("Email address not found");

}


$user = $result->fetch_assoc();


// Hash new password
$hashed_password = password_hash(
    $new_password,
    PASSWORD_DEFAULT
);


// Update password
$update_sql = "UPDATE users
               SET password = ?
               WHERE id = ?";


$update_stmt = $conn->prepare(
    $update_sql
);


$update_stmt->bind_param(
    "si",
    $hashed_password,
    $user['id']
);


if ($update_stmt->execute()) {

  header("Location: ../auth/login.php?reset=success");

    exit;

} else {

    echo "Password reset failed";

}


$stmt->close();

$update_stmt->close();

$conn->close();

?>