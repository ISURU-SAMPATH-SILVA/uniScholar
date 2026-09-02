<?php $activePage = 'classroom'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Join classroom</title>
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
                    <input type="text" placeholder="Search universities...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Join classroom</h1>
            <p class="Admin-page-subtitle">Join a new classroom listing on uniScholar.</p>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" style="padding:10px; background:#fee2e2; color:#991b1b; border-radius:6px; margin-bottom:15px;">
                    <?php
                    $errors = [
                        'notfound' => 'This course code does not have a classroom.',
                        'wrongkey' => 'The enrollment key is incorrect.',
                        'already'  => 'You have already joined this classroom.',
                    ];
                    echo htmlspecialchars($errors[$_GET['error']] ?? 'An error occurred.');
                    ?>
                </div>
            <?php endif; ?>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>Classroom Details</h3>
                    <a href="student_dashbord.php">Back to Dashboard</a>
                </div>

                <form class="Admin-settings-form" action="../database/student-classroom-join.php" method="post">

                    <div class="Admin-field">
                        <label for="courseCode">Course Code</label>
                        <input type="text" id="courseCode" name="course_code" placeholder="e.g. CMT101" required>
                    </div>

                    <div class="Admin-field">
                        <label for="enrollmentKey">Enrollment Key</label>
                        <input type="text" id="enrollmentKey" name="enrollment_key" placeholder="e.g. XY23K9" required>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="student_dashbord.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Cancel</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary">Join Classroom</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>