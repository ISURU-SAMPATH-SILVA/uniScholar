<?php

$host = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "unischolar";

$conn = new mysqli($host, $dbUser, $dbPass);

if ($conn->connect_error) {
    die("MySQL server ekata connect wenna baha: " . $conn->connect_error);
}

$sqlCreateDb = "CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if (!$conn->query($sqlCreateDb)) {
    die("Database eka create karanna baha: " . $conn->error);
}

$conn->select_db($dbName);

$sqlCreateUsers = "
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('user','admin') NOT NULL DEFAULT 'user',
    `university` INT(50) NOT NULL,
    `choose_your_faculty` VARCHAR(150) NOT NULL,
    `study_year` INT(5) NOT NULL,
    `semester` INT(2) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

if (!$conn->query($sqlCreateUsers)) {
    die("users table eka create karanna baha: " . $conn->error);
}

$sqlCreateClassrooms = "
CREATE TABLE IF NOT EXISTS `classrooms` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `Classroom_name` VARCHAR(150) NOT NULL,
    `course_code` VARCHAR(50) NOT NULL,
    `enrollment_key` VARCHAR(50) NOT NULL,
    `Semester` INT(2) NULL,
    `Study_year` INT(5) NULL,
    `faculy` VARCHAR(150) NULL,
    `status` VARCHAR(20) NOT NULL DEFAULT 'active',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_classroom_course` (`Classroom_name`, `course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

if (!$conn->query($sqlCreateClassrooms)) {
    die("classrooms table eka create karanna baha: " . $conn->error);
}

// files table eka auto create kirima
$sqlCreateFiles = "
CREATE TABLE IF NOT EXISTS `files` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `file_name` VARCHAR(255) NOT NULL,
    `file_path` VARCHAR(255) NOT NULL,
    `uploaded_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

if (!$conn->query($sqlCreateFiles)) {
    die("files table eka create karanna baha: " . $conn->error);
}

?>