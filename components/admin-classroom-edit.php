<?php
require '../database/connection.php';

$message = "";


$course_code = $_GET['id'] ?? '';

if (empty($course_code)) {
    die("The classroom code has not been provided.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Classroom_name = trim($_POST['Classroom_name'] ?? '');
    $new_course_code = trim($_POST['course_code'] ?? '');
    $enrollment_key = trim($_POST['enrollment_key'] ?? '');
    $Semester       = is_numeric($_POST['Semester'] ?? '') ? (int) $_POST['Semester'] : null;
    $Study_year     = is_numeric($_POST['Study_year'] ?? '') ? (int) $_POST['Study_year'] : null;
    $faculy         = $_POST['faculy'] ?? '';
    $status         = $_POST['status'] ?? 'active';
    $old_course_code = $_POST['old_course_code'] ?? '';

    if (empty($Classroom_name) || empty($new_course_code) ) {
        $message = "Classroom name, course code, and  are required.";
    } else {
        $sql = "UPDATE classrooms SET 
                    Classroom_name = ?, 
                    course_code = ?, 
                    enrollment_key = ?, 
                    Semester = ?, 
                    Study_year = ?, 
                    faculy = ?, 
                    status = ?
                WHERE course_code = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssiisssss",
            $Classroom_name,
            $new_course_code,
            $enrollment_key,
            $lecturer_name,
            $Semester,
            $Study_year,
            $university,
            $faculy,
            $status,
            $old_course_code
        );

        if ($stmt->execute()) {
            header("Location: admin-classroom.php");
            exit();
        } else {
            $message = "Update error: " . $stmt->error;
        }
        $stmt->close();
    }

    
    $course_code = $old_course_code;
}


$sql = "SELECT * FROM classrooms WHERE course_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $course_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Classroom not found.");
}

$classroom = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Edit classroom</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
 
</head>

<body>

    <div class="Admin-wrapper">

        <?php require 'admin_slide_bar.php'; ?>
        <?php require 'admin_slide_bar_script.php'; ?>

        <main class="Admin-main">

            <div class="Admin-topbar">
                <div class="Admin-topbar-search">
                    <input type="text" placeholder="Search classrooms...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Edit classroom</h1>
            <p class="Admin-page-subtitle">Update this classroom's details.</p>

            <?php if ($message): ?>
                <div class="alert alert-danger" style="padding:10px; background:#fee2e2; color:#991b1b; border-radius:6px; margin-bottom:15px;">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>Classroom Details</h3>
                    <a href="admin-classroom.php">Back to Classrooms</a>
                </div>

                <form class="Admin-settings-form" action="admin-classroom-edit.php?id=<?php echo urlencode($classroom['course_code']); ?>" method="post">

                    <input type="hidden" name="old_course_code" value="<?php echo htmlspecialchars($classroom['course_code']); ?>">

                    <div class="Admin-field">
                        <label for="classroomName">Classroom Name</label>
                        <input type="text" id="classroomName" name="Classroom_name" value="<?php echo htmlspecialchars($classroom['Classroom_name']); ?>" required>
                    </div>
                  

                    <div class="Admin-field">
                        <label for="classroomCourseCode">Course Code</label>
                        <input type="text" id="classroomCourseCode" name="course_code" value="<?php echo htmlspecialchars($classroom['course_code']); ?>" required>
                    </div>
                    <div class="Admin-field">
                        <label for="classroomCourseCode">Enrollment Key</label>
                        <input type="text" id="enrollment_key" name="enrollment_key" value="<?php echo htmlspecialchars($classroom['enrollment_key']); ?>" required>
                    </div>


                    <div class="Admin-field">
                        <label for="classroomSemester">Semester</label>
                        <select id="classroomSemester" name="Semester">
                            <option value="">-- Select Semester --</option>
                            <option value="1" <?php echo $classroom['Semester'] == 1 ? 'selected' : ''; ?>>First Semester</option>
                            <option value="2" <?php echo $classroom['Semester'] == 2 ? 'selected' : ''; ?>>Second Semester</option>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="classroomStudyYear">Study Year</label>
                        <select id="classroomStudyYear" name="Study_year">
                            <option value="">-- Select Study Year --</option>
                            <option value="1" <?php echo $classroom['Study_year'] == 1 ? 'selected' : ''; ?>>First Year</option>
                            <option value="2" <?php echo $classroom['Study_year'] == 2 ? 'selected' : ''; ?>>Second Year</option>
                            <option value="3" <?php echo $classroom['Study_year'] == 3 ? 'selected' : ''; ?>>Third Year</option>
                            <option value="4" <?php echo $classroom['Study_year'] == 4 ? 'selected' : ''; ?>>Fourth Year</option>
                        </select>
                    </div>

                   
                    <div class="Admin-field">
                        <label for="AdmissionsFaculty">Choose your Faculty</label>
                        <select id="AdmissionsFaculty" name="faculy">
                            <?php
                            $faculties = [
                                "Faculty of Technology", "Faculty of Applied Sciences", "Faculty of Agriculture",
                                "Faculty of Medicine", "Faculty of Engineering", "Faculty of Law",
                                "Faculty of Business", "Faculty of Education", "Faculty of Social Sciences"
                            ];
                            foreach ($faculties as $fac):
                                $selected = ($classroom['faculy'] === $fac) ? 'selected' : '';
                            ?>
                                <option value="<?php echo htmlspecialchars($fac); ?>" <?php echo $selected; ?>><?php echo htmlspecialchars($fac); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="classroomStatus">Status</label>
                        <select id="classroomStatus" name="status">
                            <option value="active" <?php echo $classroom['status'] === 'active' ? 'selected' : ''; ?>>Active</option>
                            <option value="inactive" <?php echo $classroom['status'] === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="admin-classroom.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Cancel</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary">Update Classroom</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>