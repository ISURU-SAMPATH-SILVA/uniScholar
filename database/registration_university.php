<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

// Check user is registered
if (!isset($_SESSION["user_id"])) {
    die("User not found. Please register again.");
}

// Get logged-in user's ID
$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $university = $_POST["university"];
    $faculty = $_POST["faculty"];
    $study_year = $_POST["study_year"];
    $semester = $_POST["semester"];

    // Update user's university details
    $sql = "UPDATE users
            SET university = ?,
                choose_your_faculty = ?,
                study_year = ?,
                semester = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssiii",
        $university,
        $faculty,
        $study_year,
        $semester,
        $user_id
    );

    if ($stmt->execute()) {

        echo "Registration successful!";
        header("Location: ../auth/login.php");
        exit();

      

    } else {

        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>