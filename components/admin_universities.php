<?php $activePage = 'universities'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Universities</title>
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

            <h1 class="Admin-page-title">Universities</h1>
            <p class="Admin-page-subtitle">Manage the list of universities shown on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Universities</h3>
                    <a href="admin-university-add.php">+ Add University</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Courses</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $universities = [
                               
                                ['name' => 'University of Peradeniya', 'location' => 'Kandy', 'courses' => 51, 'status' => 'active'],
                                ['name' => 'University of Jaffna', 'location' => 'Jaffna', 'courses' => 21, 'status' => 'inactive'],
                            ];

                            foreach ($universities as $u):
                                $badgeClass = $u['status'] === 'active' ? 'Admin-badge-active' : 'Admin-badge-inactive';
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($u['name']); ?></td>
                                    <td><?php echo htmlspecialchars($u['location']); ?></td>
                                    <td><?php echo (int) $u['courses']; ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeClass; ?>"><?php echo ucfirst($u['status']); ?></span></td>
                                    <td>
                                        <a href="admin-university-edit.php?id=<?php echo urlencode($u['name']); ?>">Edit</a>
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
