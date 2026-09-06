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
</head>

<body>

    <div class="Admin-wrapper">

        <?php require 'admin_slide_bar.php'; ?>
        <?php require 'admin_slide_bar_script.php'; ?>

        <?php

        require '../database/connection.php'; /*data base eke path eka*/

        $successMsg = '';
        $errorMsg = '';
        $totalStudents = 0;
        $totalUniversities = 0;
        $totalScholarships = 0;
        $totalCourses_Listed = 0;

        $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM users WHERE role IN ('user')");
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            $totalStudents = $row['cnt'];
        }

        $res2 = mysqli_query($conn, "SELECT COUNT(DISTINCT university) AS cnt FROM users WHERE role = 'user'");
        if ($res2) {
            $row2 = mysqli_fetch_assoc($res2);
            $totalUniversities = $row2['cnt'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_role'])) {
            $userId  = (int) $_POST['user_id'];
            $newRole = $_POST['new_role'];


            $allowedRoles = ['user', 'admin'];
            if (in_array($newRole, $allowedRoles, true)) {

                $stmt = mysqli_prepare($conn, "UPDATE users SET role = ? WHERE id = ?");
                mysqli_stmt_bind_param($stmt, "si", $newRole, $userId);

                if (mysqli_stmt_execute($stmt)) {
                    $successMsg = "User #$userId role updated to '$newRole'.";
                } else {
                    $errorMsg = "Update error occurred.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $errorMsg = "Invalid role value provided.";
            }
        }

        // Handle delete user
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_delete'])) {
            $userId = (int) $_POST['user_id'];

            $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $userId);

            if (mysqli_stmt_execute($stmt)) {
                $successMsg = "User #$userId successfully deleted.";
            } else {
                $errorMsg = "Delete error occurred.";
            }
            mysqli_stmt_close($stmt);
        }


        $users = [];
        $result = mysqli_query($conn, "SELECT id, fname, lname, email, role, university, choose_your_faculty, study_year, semester FROM users ORDER BY role DESC, id DESC");
        if ($result) {
            while ($r = mysqli_fetch_assoc($result)) {
                $users[] = $r;
            }
        }
        ?>

        <!-- Main content -->
        <main class="Admin-main">


            <div class="Admin-topbar">
                <div class="Admin-topbar-search">
                    <input type="text" placeholder="Search students, courses...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Admin Dashboard</h1>


            <div class="Admin-stats-grid">
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">👨‍🎓</div>
                    <div>
                        <h2><?= htmlspecialchars($totalStudents) ?></h2>
                        <p>Total Students</p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🏫</div>
                    <div>
                        <h2><?= htmlspecialchars($totalUniversities) ?></h2>
                        <p>Universities</p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">📑</div>
                    <div>
                        <h2><?= htmlspecialchars($totalCourses_Listed) ?></h2>
                        <p>Courses Listed</p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">✈️</div>
                    <div>
                        <h2><?= htmlspecialchars($totalScholarships) ?></h2>
                        <p>Scholarships</p>
                    </div>
                </div>
            </div>

            <?php if ($successMsg): ?>
                <div class="alert alert-success" style="padding:10px; background:#d4edda; color:#155724; border-radius:6px; margin-bottom:15px;">
                    <?= htmlspecialchars($successMsg) ?>
                </div>
            <?php endif; ?>

            <?php if ($errorMsg): ?>
                <div class="alert alert-danger" style="padding:10px; background:#f8d7da; color:#721c24; border-radius:6px; margin-bottom:15px;">
                    <?= htmlspecialchars($errorMsg) ?>
                </div>
            <?php endif; ?>
            <div class="Admin-stats-grid">

                <a href="admin-classroom-add.php">
                    <div class="Admin-stat-card">

                        <div>
                            <h5><b>Create New
                                    Clasroom</b></h5>
                        </div>
                    </div>
                </a>
                <a href="admin-admission.php">
                    <div class="Admin-stat-card">

                        <div>
                            <h5><b>Create New
                                    Admission</b></h5>
                        </div>
                    </div>
                </a>
                <a href="admin-course-add.php">
                    <div class="Admin-stat-card">

                        <div>
                            <h5><b>  Create New
                Course</b></h5>
                        </div>
                    </div>
                </a>
              
                <a href="Note.php">
                    <div class="Admin-stat-card">

                        <div>
                            <h5><b>Create New
                                    Note</b></h5>
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