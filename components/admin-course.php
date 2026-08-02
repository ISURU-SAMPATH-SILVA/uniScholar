<?php $activePage = 'course'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - course</title>
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
                    <input type="text" placeholder="Search classroom...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Course</h1>
            <p class="Admin-page-subtitle">Manage the list of Course shown on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Courses</h3>
                    <a href="admin-course-add.php">+ Add Course</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $Course = [
                               
                                ['Course Name' => 'Mathematics for Technology I', 'Course Code' => 'CMT 1307', 'Semester' => 1, 'status' => 'active'],
                                ['Course Name' => 'CMT 1308 - Physics for Technology II', 'Course Code' => 'CMT 1308', 'Semester' => 2, 'status' => 'inactive'],
                            ];

                            foreach ($Course as $c):
                                $badgeClass = $c['status'] === 'active' ? 'Admin-badge-active' : 'Admin-badge-inactive';
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($c['Course Name']); ?></td>
                                    <td><?php echo htmlspecialchars($c['Course Code']); ?></td>
                                    <td><?php echo (int) $c['Semester']; ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeClass; ?>"><?php echo ucfirst($c['status']); ?></span></td>
                                    <td>
                                       <a href="admin-course-edit.php?id=<?php echo urlencode($c['Course Name']); ?>">Edit</a>
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
