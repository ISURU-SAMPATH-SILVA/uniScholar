<?php $activePage = 'student'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - student</title>
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
                    <input type="text" placeholder="Search universities...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">student</h1>
            <p class="Admin-page-subtitle">Manage the list of students shown on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Students</h3>
                    <a href="admin-student-add.php">+ Add Student</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>University</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $students = [
                               
                                ['Name' => 'Menuka Sadaruwan', 'ID' => 'S001', 'University' => 'University of Rajarata', 'Status' => 'active'],
                                ['Name' => 'Sasindu Wejeesiri', 'ID' => 'S002', 'University' => 'University of Moratuwa', 'Status' => 'inactive'],
                                       
                            ];

                            foreach ($students as $s):
                                $badgeClass = $s['Status'] === 'active' ? 'Admin-badge-active' : 'Admin-badge-inactive';
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($s['Name']); ?></td>
                                    <td><?php echo htmlspecialchars($s['ID']); ?></td>
                                    <td><?php echo htmlspecialchars($s['University']); ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeClass; ?>"><?php echo ucfirst($s['Status']); ?></span></td>
                                    <td>
                                       <a href="admin-student-edit.php?id=<?php echo urlencode($s['ID']); ?>">Edit</a>
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
