<?php $activePage = 'admission'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Admission</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    
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

            <h1 class="Admin-page-title">Admission</h1>
            <p class="Admin-page-subtitle">Review and manage student admission applications.</p>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" style="padding:10px; background:#d1fae5; color:#065f46; border-radius:6px; margin-bottom:15px;">
                   Admission application has been successfully submitted!
                </div>
            <?php endif; ?>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Admission</h3>
                   
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Applicant</th>
                                <th>University</th>
                                <th>Applied Dat</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../database/connection.php';

                            $sql = "SELECT Classroom_name, course_code, Semester, Study_year, status 
                                    FROM classrooms 
                                    ORDER BY Classroom_name ASC";

                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0):
                                while ($c = $result->fetch_assoc()):
                                    $badgeClass = $c['status'] === 'active' ? 'Admin-badge-active' : 'Admin-badge-inactive';
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($c['Classroom_name']); ?></td>
                                    <td><?php echo htmlspecialchars($c['course_code']); ?></td>
                                    <td><?php echo (int) $c['Semester']; ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeClass; ?>"><?php echo ucfirst($c['status']); ?></span></td>
                                    <td>
                                       <a href="admin-classroom-edit.php?id=<?php echo urlencode($c['course_code']); ?>">Edit</a>
                                    </td>
                                </tr>
                            <?php
                                endwhile;
                            else:
                            ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;">I haven't added any classrooms yet.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>