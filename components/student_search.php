<?php $activePage = 'search'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - search</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>

<body>

    <div class="Admin-wrapper">

       
        <?php require 'studend_slide_bar.php'; ?>
        <?php require 'student_slide_bar_script.php'; ?>

        <main class="Admin-main">

            <div class="Admin-topbar">
                
                <div class="Admin-topbar-profile">
                    <span>Student</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">search</h1>
            <p class="Admin-page-subtitle">Manage the search results shown on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>All search</h3>
                     <?php require 'search.php'; ?>
                    
                </div>
                <div class="Admin-table-wrap">
                    
                            
                        
                </div>
            </div>

        </main>
    </div>

    
    <?php require 'Footer.php'; ?>

</body>

</html>
