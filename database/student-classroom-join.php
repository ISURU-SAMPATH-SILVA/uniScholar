<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connection.php");


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request";
    exit;
}

$student_id     = $_SESSION['user_id'];
$course_code    = trim($_POST['course_code'] ?? '');
$enrollment_key = trim($_POST['enrollment_key'] ?? '');

if (empty($course_code) || empty($enrollment_key)) {
    header("Location: ../components/student-classroom-join.php?error=notfound");
    exit();
}

$sql = "SELECT course_code, enrollment_key FROM classrooms WHERE course_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $course_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: ../components/student-classroom-join.php?error=notfound");
    exit();
}

$classroom = $result->fetch_assoc();
$stmt->close();

if ($classroom['enrollment_key'] !== $enrollment_key) {
    header("Location: ../components/student-classroom-join.php?error=wrongkey");
    exit();
}


$checkSql = "SELECT id FROM student_classrooms WHERE student_id = ? AND course_code = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("is", $student_id, $course_code);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    header("Location: ../components/student-classroom-join.php?error=already");
    exit();
}
$checkStmt->close();


$insertSql = "INSERT INTO student_classrooms (student_id, course_code) VALUES (?, ?)";
$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("is", $student_id, $course_code);

if ($insertStmt->execute()) {
    header("Location: ../components/student_dashbord.php?joined=1");
    exit();
} else {
    echo "Join error: " . $insertStmt->error;
}

$insertStmt->close();
$conn->close();

?>