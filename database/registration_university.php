<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if (!isset($_SESSION["user_id"])) {
    die("User not found. Please register again.");
}

$user_id = $_SESSION["user_id"];



if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}



$university = trim($_POST["university"] ?? '');
$faculty = trim($_POST["faculty"] ?? '');
$study_year = $_POST["study_year"] ?? '';
$semester = $_POST["semester"] ?? '';



if (
    empty($university) ||
    empty($faculty) ||
    empty($study_year) ||
    empty($semester)
) {
    die("Please complete all fields.");
}

/* Update user's university details */

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


    $_SESSION["university"] = $university;
    $_SESSION["faculty"] = $faculty;
    $_SESSION["study_year"] = $study_year;
    $_SESSION["semester"] = $semester;

    header("Location: ../auth/login.php");
    exit();

} else {

    die("Error: " . $stmt->error);
}

$stmt->close();
$conn->close();

?>