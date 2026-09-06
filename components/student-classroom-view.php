<?php

require '../database/connection.php';

$search_param = $_GET['id'] ?? ($_GET['Classroom_name'] ?? null);

if (!$search_param) {
    die("Classroom parameter is missing!");
}

$classQuery = $conn->prepare("SELECT * FROM classrooms WHERE id = ? OR Classroom_name = ? OR course_code = ?");
$classQuery->bind_param("sss", $search_param, $search_param, $search_param);
$classQuery->execute();
$classInfo = $classQuery->get_result()->fetch_assoc();

$updates = null;

if ($classInfo) {
    $real_classroom_id = $classInfo['id'];

    $updateQuery = $conn->prepare("SELECT * FROM classroom_updates WHERE classroom_id = ? ORDER BY created_at DESC");
    $updateQuery->bind_param("i", $real_classroom_id);
    $updateQuery->execute();
    $updates = $updateQuery->get_result();
}
?>
<?php $activePage = 'classroom'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Classroom</title>

    <!-- External CSS Files -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="../js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <div class="Admin-wrapper">

        <?php require 'studend_slide_bar.php'; ?>
        <?php require 'student_slide_bar_script.php'; ?>

        <div class="Admin-main">
            <div class=" Classroom-page-wrap container-fluid p-0">
                <?php if ($classInfo): ?>

                    <!-- classroom hero header -->
                    <div class="Classroom-hero">
                        <div class="Classroom-hero-content">
                            <span class="Classroom-hero-tag">
                                <i class="fa-solid fa-chalkboard"></i> Classroom
                            </span>
                            <h2 class="Classroom-hero-title"><?php echo htmlspecialchars($classInfo['Classroom_name']); ?></h2>
                            <p class="Classroom-hero-code">
                                <i class="fa-solid fa-hashtag"></i>
                                Course Code: <span><?php echo htmlspecialchars($classInfo['course_code'] ?? 'N/A'); ?></span>
                            </p>
                        </div>
                        <a href="student_classroom.php" class="Classroom-back-btn">
                            <i class="fa-solid fa-arrow-left"></i> Back to Classrooms
                        </a>
                    </div>

                    <h4 class="Classroom-section-title">
                        <i class="fa-solid fa-bell"></i> Classroom Materials & Updates
                    </h4>

                    <?php if ($updates && $updates->num_rows > 0): ?>
                        <div class="Classroom-updates-grid">
                            <?php while ($row = $updates->fetch_assoc()): ?>
                                <div class="Classroom-update-card">
                                    <div class="Classroom-update-body">
                                        <h5 class="Classroom-update-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                        <div class="Classroom-update-date">
                                            <i class="fa-regular fa-clock"></i>
                                            <?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?>
                                        </div>
                                        <div class="Classroom-update-desc">
                                            <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                                        </div>
                                    </div>

                                    <?php if (!empty($row['file_path'])): ?>
                                        <div class="Classroom-update-footer">
                                            <a href="../<?php echo htmlspecialchars($row['file_path']); ?>" download class="Classroom-download-btn">
                                                <i class="fa-solid fa-download"></i> Download Attachment
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="Classroom-empty-state">
                            <i class="fa-solid fa-circle-info"></i>
                            <p>No updates or files have been added to this Classroom yet.</p>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="Classroom-notfound-state">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p>
                            Classroom not found.
                            <strong><?php echo htmlspecialchars($search_param); ?></strong>
                            — There is no corresponding classroom in the database for this value.
                        </p>
                        <a href="student_classroom.php" class="Classroom-back-btn">
                            <i class="fa-solid fa-arrow-left"></i> Go Back
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <?php require 'Footer.php'; ?>
</body>

</html>