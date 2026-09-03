<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Join classroom</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="Admin-wrapper">

        <?php require 'studend_slide_bar.php'; ?>
        <?php require 'student_slide_bar_script.php'; ?>
        <?php
       include('../database/connection.php');

        $result = $conn->query("SELECT * FROM files ORDER BY uploaded_at DESC");
        ?>
        <div class="Admin-table-wrap">
            <table class="Admin-table">
                <h2>Uploaded Files</h2>

                <tr>
                    <th>File Name</th>
                    <th>Uploaded Date</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['file_name']); ?></td>
                        <td><?php echo $row['uploaded_at']; ?></td>
                        <td><a href="<?php echo $row['file_path']; ?>" download>Download</a></td>
                    </tr>
                <?php endwhile; ?>

            </table>
        </div>
    </div>
    <?php require 'Footer.php'; ?>

</body>

</html>