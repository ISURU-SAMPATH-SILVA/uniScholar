<?php
require_once '../database/connection.php';
$result = $conn->query("SELECT id, file_name, file_path, uploaded_at FROM Note ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>Note - uniScholar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-color: var(--color-primary); min-height: 100vh; padding: 2rem 1.5rem;">

    <div class="Classroom-page-wrap">

        

        <?php if ($result && $result->num_rows > 0): ?>
            <div class="Classroom-updates-grid">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="Classroom-update-card">
                        <div>
                            <div class="Classroom-update-title">
                                <i class="fa-solid fa-file-lines"></i>
                                <?php echo htmlspecialchars($row['file_name']); ?>
                            </div>
                            <div class="Classroom-update-date">
                                <i class="fa-regular fa-clock"></i>
                                <?php echo htmlspecialchars($row['uploaded_at']); ?>
                            </div>
                        </div>
                        <div class="Classroom-update-footer">
                            <a href="<?php echo htmlspecialchars($row['file_path']); ?>"
                               target="_blank" class="Classroom-download-btn">
                                <i class="fa-solid fa-download"></i> Open / Download
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="Classroom-empty-state">
                <i class="fa-solid fa-inbox"></i>
                <p>not such as file</p>
            </div>
        <?php endif; ?>

    </div>

<?php $conn->close(); ?>
</body>
</html>