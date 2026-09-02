<?php $activePage = 'classroom'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Add classroom</title>
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
                    <input type="text" placeholder="Search universities...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Add classroom</h1>
            <p class="Admin-page-subtitle">Create a new classroom listing on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>Classroom Details</h3>
                    <a href="admin_classroom.php">Back to Classrooms</a>
                </div>

                <form class="Admin-settings-form" action="../database/admin-classroom-save.php" method="post">

                    <div class="Admin-field">
                        <label for="classroomName">Classroom Name</label>
                        <input type="text" id="classroomName" name="Classroom_name" placeholder="e.g. Room 101" required>
                    </div>

                    <div class="Admin-field">
                        <label for="classroomCourse Code">Course Code</label>
                        <input type="text" id="classroomCourse Code" name="course_code" placeholder="e.g. CMT101" required>
                    </div>

                    <div class="Admin-field">
                        <label for="classroomCourse Code">Enrollment Key</label>
                        <input type="text" id="classroomCourse Code" name="enrollment_key" placeholder="e.g. CMT2024" required>
                    </div>

                   
                    <div class="Admin-field">
                        <label for="classroomSemester">Semester</label>
                        <select id="classroomSemester" name="Semester">
                            <option value="">-- Select Semester --</option>
                            <option value="1" selected>First Semester</option>
                            <option value="2">Second Semester</option>
                        </select>
                    </div>
                    <div class="Admin-field">
                        <label for="classroomStudyYear">Study Year</label>
                        <select id="classroomStudyYear" name="Study_year">
                            <option value="">-- Select Study Year --</option>
                            <option value="1" selected>First Year</option>
                            <option value="2">Second Year</option>
                            <option value="3">Third Year</option>
                            <option value="4">Fourth Year</option>
                        </select>
                    </div>
                   
                    <div class="Admin-field">
                        <label for="AdmissionsFaculty">Choose your Faculty</label>
                        <select id="AdmissionsFaculty" name="faculy">
                            <option name="faculy" value="">-- Select Faculty --</option>
                            <option name="faculy" value="Faculty of Technology">Faculty of Technology</option>
                            <option name="faculy" value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                            <option name="faculy" value="Faculty of Agriculture">Faculty of Agriculture</option>
                            <option name="faculy" value="Faculty of Medicine">Faculty of Medicine</option>
                            <option name="faculy" value="Faculty of Engineering">Faculty of Engineering</option>
                            <option name="faculy" value="Faculty of Law">Faculty of Law</option>
                            <option name="faculy" value="Faculty of Business">Faculty of Business</option>
                            <option name="faculy" value="Faculty of Education">Faculty of Education</option>
                            <option name="faculy" value="Faculty of Social Sciences">Faculty of Social Sciences</option>
                        </select>
                    </div>


                    <div class="Admin-field">
                        <label for="classroomStatus">Status</label>
                        <select id="classroomStatus" name="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="Admin-field Admin-field-full">
                        <label for="classroomDescription">Description</label>
                        <textarea id="classroomDescription" name="description" placeholder="Short description of the classroom..."></textarea>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="admin-classrooms.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Cancel</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary">Add Classroom</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>