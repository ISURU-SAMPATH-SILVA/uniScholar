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

            <h1 class="Admin-page-title">Manage Users</h1>
            

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
                        <h2>342</h2>
                        <p>Courses Listed</p>
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

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Users (<?= count($users) ?>)</h3>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>University</th>
                                <th>Faculty</th>
                                <th>Current Role</th>
                                <th>Change Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($users) > 0): ?>
                                <?php foreach ($users as $u): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($u['id']) ?></td>
                                        <td><?= htmlspecialchars($u['fname'] . ' ' . $u['lname']) ?></td>
                                        <td><?= htmlspecialchars($u['email']) ?></td>
                                        <td><?= htmlspecialchars($u['university']) ?></td>
                                        <td><?= htmlspecialchars($u['choose_your_faculty']) ?></td>
                                        <td>
                                            <?php if ($u['role'] === 'admin'): ?>
                                                <span class="Admin-badge Admin-badge-active">Admin</span>
                                            <?php else: ?>
                                                <span class="Admin-badge Admin-badge-pending">User</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <form method="POST" style="display:flex; gap:6px; align-items:center;">
                                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($u['id']) ?>">
                                                <select name="new_role" style="padding:4px 8px; border-radius:5px;">
                                                    <option value="user" <?= $u['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                                    <option value="admin" <?= $u['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                                </select>
                                                <button type="submit" name="update_role" class="btn btn-sm btn-primary">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" style="text-align:center;">No users found.</td>
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