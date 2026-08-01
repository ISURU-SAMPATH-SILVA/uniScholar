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

        <?php require 'admin_slide_bar.php'; ?> 
        <?php require 'admin_slide_bar_script.php'; ?>

        <!-- Main content -->
        <main class="Admin-main">

            <!-- Desktop top bar -->
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
                        <h2>1,248</h2>
                        <p>Total Students</p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">🏫</div>
                    <div>
                        <h2>18</h2>
                        <p>Universities</p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">📑</div>
                    <div>
                        <h2>342</h2>
                        <p>Courses Listed</p>
                    </div>
                </div>
                <div class="Admin-stat-card">
                    <div class="Admin-stat-icon">✈️</div>
                    <div>
                        <h2>2</h2>
                        <p>Active Scholarships</p>
                    </div>
                </div>
            </div>

            <!-- Recent activity table -->
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
                                <th>Course</th>
                                <th>Status</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nisal Nethsara</td>
                                <td>University of Colombo</td>
                                <td>Computer Science</td>
                                <td><span class="Admin-badge Admin-badge-active">Active</span></td>
                                <td>2026-07-28</td>
                            </tr>
                            <tr>
                                <td>Menuka Sadaruwan</td>
                                <td>University of Moratuwa</td>
                                <td>Electronics Eng.</td>
                                <td><span class="Admin-badge Admin-badge-pending">Pending</span></td>
                                <td>2026-07-27</td>
                            </tr>
                        
                            <tr>
                                <td>Indika Thotawaththa</td>
                                <td>University of Kelaniya</td>
                                <td>Mathematics</td>
                                <td><span class="Admin-badge Admin-badge-inactive">Inactive</span></td>
                                <td>2026-07-22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <?php require 'admin_slide_bar_script.php'; ?>

</body>

</html>