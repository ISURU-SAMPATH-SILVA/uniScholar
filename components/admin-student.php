<?php $activePage = 'student'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Students</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>

<body>

    <div class="Admin-wrapper">

        <?php require 'admin_slide_bar.php'; ?>
        <?php require 'admin_slide_bar_script.php'; ?>

        <main class="Admin-main">

            <div class="Admin-topbar">
                <div class="Admin-topbar-search">
                    <input type="text" placeholder="Search students...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Students</h1>
            <p class="Admin-page-subtitle">Manage registered student accounts.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Students</h3>
                    <a href="admin-student.php">+ Add Student</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>University</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // TODO: Replace me sample array eka database query result ekakin.
                            $students = [
                                ['name' => 'Nimasha Perera', 'university' => 'University of Colombo', 'course' => 'Computer Science', 'status' => 'active', 'joined' => '2026-07-28'],
                                ['name' => 'Kasun Fernando', 'university' => 'University of Moratuwa', 'course' => 'Electronics Eng.', 'status' => 'pending', 'joined' => '2026-07-27'],
                                ['name' => 'Dilani Wickramasinghe', 'university' => 'University of Peradeniya', 'course' => 'Business Mgmt.', 'status' => 'active', 'joined' => '2026-07-25'],
                                ['name' => 'Ashan Silva', 'university' => 'University of Kelaniya', 'course' => 'Mathematics', 'status' => 'inactive', 'joined' => '2026-07-22'],
                            ];

                            $badgeMap = [
                                'active'   => 'Admin-badge-active',
                                'pending'  => 'Admin-badge-pending',
                                'inactive' => 'Admin-badge-inactive',
                            ];

                            foreach ($students as $s):
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($s['name']); ?></td>
                                    <td><?php echo htmlspecialchars($s['university']); ?></td>
                                    <td><?php echo htmlspecialchars($s['course']); ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeMap[$s['status']]; ?>"><?php echo ucfirst($s['status']); ?></span></td>
                                    <td><?php echo htmlspecialchars($s['joined']); ?></td>
                                    <td>
                                        <a href="admin-student-edit.php?id=<?php echo urlencode($s['name']); ?>">Edit</a>
                                        <a href="#" class="Admin-action-delete">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>