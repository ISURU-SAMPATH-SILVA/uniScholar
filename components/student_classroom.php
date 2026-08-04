<?php $activePage = 'classroom'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - classroom</title>
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

            <h1 class="Admin-page-title">Classrooms</h1>
            <p class="Admin-page-subtitle">Manage the list of classrooms shown on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Classrooms</h3>
                    <a href="admin-classroom-add.php">+ Add Classroom</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Classroom</th>
                                <th>Course Code</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $classrooms = [
                               
                                ['Classroom' => 'Web Technology', 'Course Code' => 'ICT-1209', 'Semester' => 2, 'status' => 'active'],
                                ['Classroom' => 'Introduction to Multimedia', 'Course Code' => 'ICT-1210', 'Semester' => 1, 'status' => 'inactive'], 
                                ['Classroom' => 'Skill Development', 'Course Code' => 'ICT-1108', 'Semester' => 2, 'status' => 'active'],
                            ];

                            foreach ($classrooms as $c):
                                $badgeClass = $c['status'] === 'active' ? 'Admin-badge-active' : 'Admin-badge-inactive';
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($c['Classroom']); ?></td>
                                    <td><?php echo htmlspecialchars($c['Course Code']); ?></td>
                                    <td><?php echo (int) $c['Semester']; ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeClass; ?>"><?php echo ucfirst($c['status']); ?></span></td>
                                    <td>
                                       <a href="admin-classroom-edit.php?id=<?php echo urlencode($c['Classroom']); ?>">Edit</a>
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
