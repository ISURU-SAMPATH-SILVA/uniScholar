<?php $activePage = 'dashboard'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
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
                    <span>Nisal Nethsara</span>
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
                        <h2>Faculty of Technology</h2>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🗓️</div>
                    <div>

                        <p>Study Year</p>
                        <h2>1</h2>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🎓</div>
                    <div>
                        
                        <p>Semester</p>
                        <h2>2</h2>
                    </div>
                </div>

            </div>
            
            <div class="Admin-stats-grid">
                <a href="Past-Paper.php">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">📚</div>
                    <div>
                       
                       <p> Past-Paper</p>
                    </div>
                </div>
                </a>
                <a href="student-classroom.php">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">📝</div>
                    <div>
                        <p>Notes</p>
                    </div>
                </div>
                </a>
                <a href="student-classroom.php">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon"></div>
                    <div>
                        <p>GPA-Cal</p>
                    </div>
                </div>
                </a>
                 <a href="student-classroom.php">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon"></div>
                    <div>
                        <p>Course</p>
                    </div>
                </div>
                </a>
                 <a href="student-classroom.php">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">📝</div>
                    <div>
                        <p>Last Note</p>
                    </div>
                </div>
                </a>
                 <a href="student-classroom.php">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon"></div>
                    <div>
                        <p>Need Help?</p>
                    </div>
                </div>
                </a><center>
                FINO THẾ COURSE PONF FOR TOUH GONL<br>
            Select the program tailored to your success </center>




            </div>




        </main>
    </div>

    <?php require 'admin_slide_bar_script.php'; ?>
    <?php require 'Footer.php'; ?>


</body>

</html>