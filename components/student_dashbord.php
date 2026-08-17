<?php

session_start();

$activePage = 'dashboard';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$fullName = $_SESSION['fname'] . " " . $_SESSION['lname'];
$faculty = $_SESSION['faculty'];
$studyYear = $_SESSION['study_year'];
$semester = $_SESSION['semester'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Student Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="Admin-wrapper">

        <?php require 'studend_slide_bar.php'; ?>
        <?php require 'student_slide_bar_script.php'; ?>

        <main class="Admin-main">

            <div class="Admin-topbar">
                <div class="Admin-topbar-search">
                    <input type="text" placeholder="Search students, courses...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>
                        Welcome, <?php echo htmlspecialchars($fullName); ?>!
                    </span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Dashboard</h1>
            <p class="Admin-page-subtitle">Welcome back, here's what's happening today.</p>

            <div class="Admin-stats-grid">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🏫</div>
                    <div>
                        <p>Faculty</p>
                        <h2><?php echo htmlspecialchars($faculty); ?></h2>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🗓️</div>
                    <div>

                        <p>Study Year</p>
                        <h2><?php echo htmlspecialchars($studyYear); ?></h2>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🎓</div>
                    <div>

                        <p>Semester</p>
                         <h2><?php echo htmlspecialchars($semester); ?></h2>
                    </div>
                </div>

            </div>

            <div class="Admin-stats-grid">
               
                <a href="Past-Paper.php">
                    <div class="Admin-stat-card">
                        
                        <div>
                            <h5><b>Past Paper</b></h5>
                        </div>
                    </div>
                </a>
                <a href="student-classroom.php">
                    <div class="Admin-stat-card">
                        
                        <div >
                            <h5><b>Notes</b></h5>
                        </div>
                    </div>
                </a>
                <a href="GPA.php">
                    <div class="Admin-stat-card">
                       
                        <div>
                            <h5><b>GPA-Cal</b></h5>
                        </div>
                    </div>
                </a>
                <a href="Course.php">
                    <div class="Admin-stat-card">
                        
                        <div>
                            <h5><b>Course</b></h5>
                        </div>
                    </div>
                </a>
                




            </div>




        </main>
    </div>

    <?php require 'admin_slide_bar_script.php'; ?>
    <?php require 'Footer.php'; ?>

</body>

</html>