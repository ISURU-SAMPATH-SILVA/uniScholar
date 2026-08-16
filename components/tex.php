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
        
        require '../database/connection.php'; //data base eke path 

       
        $totalStudents = 0;
        $totalUniversities = 0;

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

       
        $students = [];
        $sql = "SELECT id, fname, lname, university, choose_your_faculty, study_year, semester, role
                FROM users
                WHERE role = 'user'
                ORDER BY id DESC
                LIMIT 5";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($r = mysqli_fetch_assoc($result)) {
                $students[] = $r;
            }
        }
        ?>

        
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

            <h1 class="Admin-page-title">Dashboard</h1>
            <p class="Admin-page-subtitle">Welcome back, here's what's happening today.</p>

            <!-- Stat cards -->
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
                        <h2>Courses Listed</h2>
                        <p><?= htmlspecialchars($totalCourses_Listed) ?></p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">✈️</div>
                    <div>
                        <h2>Scholarships</h2>
                        <p><?= htmlspecialchars($totalScholarships) ?></p>
                    </div>
                </div>
            </div>

           
            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>Recent Registrations</h3>
                    <a href="admin-students.php">View all</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>University</th>
                                <th>Faculty</th>
                               
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($students) > 0): ?>
                                <?php foreach ($students as $s): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($s['fname'] . ' ' . $s['lname']) ?></td>
                                        <td><?= htmlspecialchars($s['university']) ?></td>
                                        <td><?= htmlspecialchars($s['choose_your_faculty']) ?></td>
  
                                        <td><span class="Admin-badge Admin-badge-active"><?= htmlspecialchars($s['role']) ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;">No students found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <?php require 'admin_slide_bar_script.php'; ?>
    <?php require 'Footer.php'; ?>

</body>

</html>