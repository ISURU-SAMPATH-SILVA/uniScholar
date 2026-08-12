<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    echo "Invalid request";
    exit;
}


$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';


if (empty($email) || empty($password)) {

    echo "Email and password are required";
    exit;
}


$sql = "SELECT id, fname, lname, email, password
        FROM users
        WHERE email = ?";


$stmt = $conn->prepare($sql);


if (!$stmt) {

    echo "Database error: " . $conn->error;
    exit;
}


$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();


    if (password_verify($password, $user['password'])) {


        // Create session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['email'] = $user['email'];


        header("Location: ../index.php");
        exit;


    } else {

        echo "Wrong password";
        exit;
    }


} else {

    echo "User not found";
    exit;
}


$stmt->close();
$conn->close();

?>