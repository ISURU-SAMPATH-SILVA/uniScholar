<?php
$activePage = 'classroom';
require '../database/connection.php';

$classroom_id = $_GET['id'] ?? null;
$message = "";
$error = "";

$classroom_name = "";
if ($classroom_id) {
    $stmtClass = $conn->prepare("SELECT Classroom_name, course_code FROM classrooms WHERE id = ?");
    $stmtClass->bind_param("i", $classroom_id);
    $stmtClass->execute();
    $resClass = $stmtClass->get_result();
    if ($row = $resClass->fetch_assoc()) {
        $classroom_name = $row['Classroom_name'] . " (" . $row['course_code'] . ")";
    } else {
        die("Invalid Classroom ID!");
    }
} else {
    header("Location: admin_classroom.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $filePath = "";

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../uploads/";

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES['file']['name']); // Duplicate නොවෙන සේ unique name එකක් දීම
        $targetFilePath = $targetDir . $fileName;
        //moving to server file 

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            $filePath = "uploads/" . $fileName; // path of db
        } else {
            $error = "Failed to upload file to server!";
        }
    }

    if (empty($error)) {

        $stmt = $conn->prepare("INSERT INTO classroom_updates (classroom_id, title, description, file_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $classroom_id, $title, $description, $filePath);

        if ($stmt->execute()) {
            $message = "Update uploaded successfully!";
        } else {
            $error = "Database Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Add Classroom Update</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Scoped to this page only */
        .Admin-alert {
            padding: 0.85rem 1.1rem;
            border-radius: 8px;
            font-size: 0.88rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .Admin-alert-success {
            background-color: rgba(34, 197, 94, 0.15);
            color: #22c55e;
        }

        .Admin-alert-error {
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .Update-dropzone {
            width: 100%;
            border: 2px dashed rgba(241, 137, 10, 0.4);
            border-radius: 10px;
            background-color: var(--color-body);
            padding: 1.75rem 1.25rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .Update-dropzone:hover,
        .Update-dropzone.is-dragover {
            border-color: var(--color-accent);
            background-color: rgba(241, 137, 10, 0.06);
        }

        .Update-dropzone i {
            font-size: 1.6rem;
            color: var(--color-accent);
        }

        .Update-dropzone p {
            color: var(--color-primary);
            font-size: 0.85rem;
            opacity: 0.75;
            margin: 0;
            text-align: center;
        }

        .Update-dropzone input[type="file"] {
            display: none;
        }

        .Update-filename {
            color: var(--color-accent);
            font-size: 0.82rem;
            font-weight: 600;
            margin-top: 0.6rem;
            min-height: 1.1rem;
            word-break: break-all;
        }
    </style>
</head>

<body>

    <div class="Admin-wrapper">

        <?php require 'admin_slide_bar.php'; ?>
        <?php require 'admin_slide_bar_script.php'; ?>

        <main class="Admin-main">

            <div class="Admin-topbar">
                <div class="Admin-topbar-search">
                    <input type="text" placeholder="Search classroom...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Add Update / Material</h1>
            <p class="Admin-page-subtitle">Classroom: <strong><?php echo htmlspecialchars($classroom_name); ?></strong></p>

            <?php if ($message): ?>
                <div class="Admin-alert Admin-alert-success"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="Admin-alert Admin-alert-error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <div class="Admin-panel" style="max-width: 640px;">
                <!-- IMPORTANT: File upload සඳහා enctype="multipart/form-data" තිබීම අනිවාර්යයි -->
                <form class="Admin-settings-form" action="" method="POST" enctype="multipart/form-data">

                    <div class="Admin-field Admin-field-full">
                        <label for="updateTitle">Note / Material Title</label>
                        <input type="text" id="updateTitle" name="title" placeholder="e.g., Lecture Note 01" required>
                    </div>

                    <div class="Admin-field Admin-field-full">
                        <label for="updateDescription">Description (Optional)</label>
                        <textarea id="updateDescription" name="description" placeholder="Add some notes or details..."></textarea>
                    </div>

                    <div class="Admin-field Admin-field-full">
                        <label>Upload File (PDF / Images / Docs)</label>
                        <label class="Update-dropzone" id="dropzone" for="fileInput">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <p>Click to choose a file, or drag and drop it here</p>
                            <input type="file" name="file" id="fileInput">
                        </label>
                        <div class="Update-filename" id="fileNameDisplay"></div>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="admin_classroom.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Back</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary">Publish Update</button>
                    </div>

                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');
        const fileNameDisplay = document.getElementById('fileNameDisplay');

        function showFileName() {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            }
        }

        fileInput.addEventListener('change', showFileName);

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.add('is-dragover');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.remove('is-dragover');
            });
        });

        dropzone.addEventListener('drop', (e) => {
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                showFileName();
            }
        });
    </script>

</body>

</html>