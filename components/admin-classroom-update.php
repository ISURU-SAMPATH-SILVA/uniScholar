<?php
// Database connection eka include kirima
require '../database/connection.php';

$message = "";

if (isset($_POST['submit'])) {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        
        // uploads folder eka nathnam auto create kirima
        $targetDir = "../uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        // File Name eka unique kirima
        $uniqueFileName = time() . "_" . basename($fileName);
        $targetFilePath = $targetDir . $uniqueFileName;

        if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            // Prepared statement thulain database ekata data ethul kirima
            $stmt = $conn->prepare("INSERT INTO files (file_name, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $fileName, $targetFilePath);
            
            if ($stmt->execute()) {
                $message = "<p style='color: green;'>File එක සාර්ථකව Upload විය!</p>";
            } else {
                $message = "<p style='color: red;'>Database එකට Save කිරීමට නොහැකි විය: " . $conn->error . "</p>";
            }
            $stmt->close();
        } else {
            $message = "<p style='color: red;'>File එක Folder එකට Move කිරීමට නොහැකි විය.</p>";
        }
    } else {
        $message = "<p style='color: red;'>කරුණාකර නිවැරදි File එකක් තෝරන්න.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
</head>
<body>

    <?php 
    if (!empty($message)) {
        echo $message;
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit" name="submit">Upload File</button>
    </form>

</body>
</html>