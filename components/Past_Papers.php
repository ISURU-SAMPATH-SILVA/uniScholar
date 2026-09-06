<?php
require_once '../database/connection.php';

$message = "";
$messageType = ""; // success | error

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['upload_file'])) {

    $file = $_FILES['upload_file'];

    if ($file['error'] === UPLOAD_ERR_OK) {

        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // file name eka clean karala, duplicate wenna epa kiyala unique widihata hadanawa
        $originalName = basename($file['name']);
        $safeName = preg_replace("/[^A-Za-z0-9._-]/", "_", $originalName);
        $uniqueName = uniqid() . "_" . $safeName;

        $destination = $uploadDir . $uniqueName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {

            // DB eke store karanne relative path eka (browser eken access karanna)
            $relativePath = 'uploads/' . $uniqueName;

            $stmt = $conn->prepare("INSERT INTO past_papers (file_name, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $originalName, $relativePath);

            if ($stmt->execute()) {
                $message = "File eka upload success! Wena kenekuta list eken penna puluwan.";
                $messageType = "success";
            } else {
                $message = "DB eke save karanna baha: " . $stmt->error;
                $messageType = "error";
            }
            $stmt->close();

        } else {
            $message = "File eka server eke save karanna baha.";
            $messageType = "error";
        }

    } else {
        $message = "Upload error code: " . $file['error'];
        $messageType = "error";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>Past Papers - uniScholar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-color: var(--color-primary); min-height: 100vh;">

    <div class="Upload-card">

        <div class="Login-avatar-box">
            <i class="fa-solid fa-file-arrow-up" style="font-size: 1.6rem; color: var(--color-accent);"></i>
        </div>

        <h2 class="Login-brand-name">Past Papers</h2>
        <p class="Login-form-title">UPLOAD A NEW PAST PAPER</p>

        <?php if ($message): ?>
            <div class="Upload-alert Upload-alert-<?php echo $messageType; ?>">
                <i class="fa-solid <?php echo $messageType === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation'; ?>"></i>
                <span><?php echo htmlspecialchars($message); ?></span>
            </div>
        <?php endif; ?>

        <form action="Past_Papers.php" method="post" enctype="multipart/form-data" id="uploadForm">

            <label class="Upload-dropzone" id="dropzone" for="fileInput">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p>Drag & drop file eka mehata, nathnam click karanna</p>
                <span class="Upload-hint">PDF, DOC, DOCX, JPG, PNG — Max 10MB</span>
                <input type="file" name="upload_file" id="fileInput" required>
            </label>

            <div class="Upload-file-preview" id="filePreview">
                <i class="fa-solid fa-file Upload-file-icon"></i>
                <div class="Upload-file-info">
                    <div class="Upload-file-name" id="fileName"></div>
                    <div class="Upload-file-size" id="fileSize"></div>
                </div>
                <button type="button" class="Upload-file-remove" id="removeFile">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <button type="submit" class="Login-btn Login-btn-primary" id="submitBtn">
                <i class="fa-solid fa-upload"></i>
                <span>Upload</span>
            </button>
        </form>

        <p class="Login-footer-text">
            <a href="Past_Papers_List.php"><i class="fa-solid fa-list"></i> Uploaded past papers okkoma balanna</a>
        </p>
    </div>

    <script>
        const dropzone   = document.getElementById('dropzone');
        const fileInput  = document.getElementById('fileInput');
        const filePreview = document.getElementById('filePreview');
        const fileNameEl = document.getElementById('fileName');
        const fileSizeEl = document.getElementById('fileSize');
        const removeBtn  = document.getElementById('removeFile');
        const uploadForm = document.getElementById('uploadForm');
        const submitBtn  = document.getElementById('submitBtn');

        function formatSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        function showPreview(file) {
            fileNameEl.textContent = file.name;
            fileSizeEl.textContent = formatSize(file.size);
            filePreview.classList.add('is-visible');
        }

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                showPreview(fileInput.files[0]);
            }
        });

        ['dragover', 'dragenter'].forEach(evt => {
            dropzone.addEventListener(evt, (e) => {
                e.preventDefault();
                dropzone.classList.add('is-dragover');
            });
        });

        ['dragleave', 'drop'].forEach(evt => {
            dropzone.addEventListener(evt, (e) => {
                e.preventDefault();
                dropzone.classList.remove('is-dragover');
            });
        });

        dropzone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            if (dt.files.length > 0) {
                fileInput.files = dt.files;
                showPreview(dt.files[0]);
            }
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = "";
            filePreview.classList.remove('is-visible');
        });

        uploadForm.addEventListener('submit', () => {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner"></i> <span>Uploading...</span>';
        });
    </script>

</body>
</html>