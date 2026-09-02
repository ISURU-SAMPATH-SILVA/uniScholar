<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request";
    exit;
}

$Classroom_name = trim($_POST['Classroom_name'] ?? '');
$course_code    = trim($_POST['course_code'] ?? '');
$enrollment_key = trim($_POST['enrollment_key'] ?? '');
$Semester       = $_POST['Semester'] ?? '';
$Study_year     = $_POST['Study_year'] ?? '';
$faculy         = $_POST['faculy'] ?? '';
$status         = $_POST['status'] ?? 'active';

if (empty($Classroom_name) || empty($course_code) || empty($enrollment_key)) {
    echo "Classroom name, course code, and enrollment key are required.";
    exit;
}

$Semester = is_numeric($Semester) ? (int) $Semester : null;
$Study_year = is_numeric($Study_year) ? (int) $Study_year : null;

$checkSql = "SELECT Classroom_name FROM classrooms WHERE Classroom_name = ? AND course_code = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("ss", $Classroom_name, $course_code);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo "This combination of Classroom Name and Course Code already exists.";
    $checkStmt->close();
    $conn->close();
    exit;
}
$checkStmt->close();

// Insert query
$sql = "INSERT INTO classrooms 
            (Classroom_name, enrollment_key, course_code,  Semester, Study_year, faculy, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo "Database error: " . $conn->error;
    exit;
}

$stmt->bind_param(
    "ssssiis",
    $Classroom_name,
    $enrollment_key,
    $course_code,
    $Semester,
    $Study_year,
    $faculy,
    $status
);

if ($stmt->execute()) {
    header("Location: ../components/admin_classroom.php");
    exit();
} else {
    echo "Insert error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>