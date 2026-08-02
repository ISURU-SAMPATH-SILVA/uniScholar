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
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>

<body>

    <div class="Admin-wrapper">

        <?php require 'admin_slide_bar.php'; ?>
        <?php require 'admin_slide_bar_script.php'; ?>

        <main class="Admin-main">

            <div class="Admin-topbar">
                <div class="Admin-topbar-search">
                    <input type="text" placeholder="Search admissions...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Admission</h1>
            <p class="Admin-page-subtitle">Review and manage student admission applications.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All Applications</h3>
                    <a href="admin-admission-add.php">+ Add Application</a>
                </div>
                <div class="Admin-table-wrap">
                    <table class="Admin-table">
                        <thead>
                            <tr>
                                <th>Applicant</th>
                                <th>University</th>
                                <th>Course Applied</th>
                                <th>Applied Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // TODO: Replace me sample array eka database query result ekakin.
                            $applications = [
                                ['applicant' => 'Ravindu Jayasuriya', 'university' => 'University of Colombo', 'course' => 'Computer Science', 'date' => '2026-07-30', 'status' => 'pending'],
                                ['applicant' => 'Sithumi Bandara', 'university' => 'University of Moratuwa', 'course' => 'Electronics Eng.', 'date' => '2026-07-29', 'status' => 'approved'],
                                ['applicant' => 'Thisara Gunasekara', 'university' => 'University of Peradeniya', 'course' => 'Business Mgmt.', 'date' => '2026-07-26', 'status' => 'rejected'],
                                ['applicant' => 'Hansika Rathnayake', 'university' => 'University of Kelaniya', 'course' => 'Mathematics', 'date' => '2026-07-24', 'status' => 'approved'],
                            ];

                            $badgeMap = [
                                'approved' => 'Admin-badge-active',
                                'pending'  => 'Admin-badge-pending',
                                'rejected' => 'Admin-badge-inactive',
                            ];

                            foreach ($applications as $a):
                                $badgeClass = $badgeMap[$a['status']];
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($a['applicant']); ?></td>
                                    <td><?php echo htmlspecialchars($a['university']); ?></td>
                                    <td><?php echo htmlspecialchars($a['course']); ?></td>
                                    <td><?php echo htmlspecialchars($a['date']); ?></td>
                                    <td><span class="Admin-badge <?php echo $badgeClass; ?>"><?php echo ucfirst($a['status']); ?></span></td>
                                    <td>
                                        <a href="admin-admission-view.php?id=<?php echo urlencode($a['applicant']); ?>">View</a>
                                        <a href="#" class="Admin-action-delete">Reject</a>
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