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

        <div class="Admin-main-content">
            <div class="container-fluid p-0">
                <?php if ($classInfo): ?>
                    <!-- Classroom Header Box -->
                    <div class="card bg-dark text-light border-secondary p-4 mb-4 rounded-3 shadow">
                        <h2 class="text-warning fw-bold mb-2"><?php echo htmlspecialchars($classInfo['Classroom_name']); ?></h2>
                        <p class="text-light opacity-75 mb-3">Course Code: <?php echo htmlspecialchars($classInfo['course_code'] ?? 'N/A'); ?></p>
                        <div>
                            <a href="student_classroom.php" class="btn btn-outline-warning btn-sm">
                                <i class="fa-solid fa-arrow-left me-1"></i> Back to Classrooms
                            </a>
                        </div>
                    </div>

                    <h4 class="text-light mb-4 border-start border-warning border-4 ps-2">Classroom Materials & Updates</h4>
                    
                    <?php if ($updates && $updates->num_rows > 0): ?>
                        <div class="row g-4">
                            <?php while ($row = $updates->fetch_assoc()): ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card bg-dark text-light border-secondary h-100 p-3 d-flex flex-column justify-content-between shadow-sm">
                                        <div>
                                            <h5 class="text-warning fw-bold mb-1"><?php echo htmlspecialchars($row['title']); ?></h5>
                                            <div class="text-secondary small mb-3">
                                                <i class="fa-regular fa-clock me-1"></i>
                                                <?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?>
                                            </div>
                                            <div class="text-light opacity-90 mb-3">
                                                <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                                            </div>
                                        </div>

                                        <?php if (!empty($row['file_path'])): ?>
                                            <div class="pt-2">
                                                <a href="../<?php echo htmlspecialchars($row['file_path']); ?>" download class="btn btn-warning fw-bold btn-sm text-dark">
                                                    <i class="fa-solid fa-download me-1"></i> Download Attachment
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-secondary bg-dark text-light border-secondary">
                            <i class="fa-solid fa-circle-info me-2 text-warning"></i>No updates or files have been added to this Classroom yet.
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="alert alert-danger bg-dark text-danger border-danger mb-3">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                       Classroom not found. (<strong><?php echo htmlspecialchars($search_param); ?></strong> There is no corresponding classroom in the database for the value.)
                    </div>
                    <a href="student_classroom.php" class="btn btn-outline-warning btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Go Back
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <?php require 'Footer.php'; ?>
</body>

</html>