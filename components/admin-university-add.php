<?php $activePage = 'universities'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Add University</title>
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

            <h1 class="Admin-page-title">Add University</h1>
            <p class="Admin-page-subtitle">Create a new university listing on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>University Details</h3>
                    <a href="admin-universities.php">Back to Universities</a>
                </div>

                <form class="Admin-settings-form" action="admin-university-save.php" method="post">

                    <div class="Admin-field">
                        <label for="universityName">University Name</label>
                        <input type="text" id="universityName" name="name" placeholder="e.g. University of Colombo" required>
                    </div>

                    <div class="Admin-field">
                        <label for="universityLocation">Location</label>
                        <input type="text" id="universityLocation" name="location" placeholder="e.g. Colombo" required>
                    </div>

                    <div class="Admin-field">
                        <label for="universityWebsite">Website</label>
                        <input type="text" id="universityWebsite" name="website" placeholder="e.g. https://cmb.ac.lk">
                    </div>

                    <div class="Admin-field">
                        <label for="universityStatus">Status</label>
                        <select id="universityStatus" name="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="Admin-field Admin-field-full">
                        <label for="universityDescription">Description</label>
                        <textarea id="universityDescription" name="description" placeholder="Short description of the university..."></textarea>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="admin-universities.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Cancel</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary">Add University</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>