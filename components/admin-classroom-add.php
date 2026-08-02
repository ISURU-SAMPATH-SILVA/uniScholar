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
    <link rel="stylesheet" href="../css/admin-dashboard.css">
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

                <form class="Admin-settings-form" action="admin-classroom-save.php" method="post">

                    <div class="Admin-field">
                        <label for="classroomName">Classroom Name</label>
                        <input type="text" id="classroomName" name="name" placeholder="e.g. Room 101" required>
                    </div>

                    <div class="Admin-field">
                        <label for="classroomCourse Code">Course Code</label>
                        <input type="text" id="classroomCourse Code" name="course_code" placeholder="e.g. CMT101" required>
                    </div>

                    <div class="Admin-field">
                        <label for="classroomlecturerName">Lecturer Name</label>
                        <input type="text" id="classroomlecturerName" name="lecturer_name" placeholder="e.g. Dr.S.Wejesiri" required>
                    </div>
                     <div class="Admin-field">
                        <label for="classroomSemester">Semester</label>
                        <select id="classroomSemester" name="semester">
                            <option value="Semester">-- Select Semester --</option>
                            <option value="Semester1" selected>First Semester</option>
                            <option value="Semester2">Second Semester</option>
                        </select>
                    </div>
                    <div class="Admin-field">
                        <label for="classroomStudyYear">Study Year</label>
                        <select id="classroomStudyYear" name="study_year">
                            <option value="StudyYear">-- Select Study Year --</option>
                            <option value="StudyYear1" selected>First Year</option>
                            <option value="StudyYear2">Second Year</option>
                            <option value="StudyYear3">Third Year</option>
                            <option value="StudyYear4">Fourth Year</option>
                        </select>
                    </div>
                    <div class="Admin-field">
                        <label for="Admissionsuniversity">University</label>
                        <select id="universitySelect" name="university">
                            <option value="">-- Select University --</option>
                            <option value="University of Colombo">University of Colombo</option>
                            <option value="University of Peradeniya">University of Peradeniya</option>
                            <option value="University of Moratuwa">University of Moratuwa</option>
                            <option value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                            <option value="University of Kelaniya">University of Kelaniya</option>
                            <option value="University of Jaffna">University of Jaffna</option>
                            <option value="University of Ruhuna">University of Ruhuna</option>
                            <option value="The Open University of Sri Lanka">The Open University of Sri Lanka</option>
                            <option value="Eastern University, Sri Lanka">Eastern University, Sri Lanka</option>
                            <option value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                            <option value="Rajarata University of Sri Lanka">Rajarata University of Sri Lanka</option>
                            <option value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                            <option value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                            <option value="Uva Wellassa University">Uva Wellassa University</option>
                            <option value="University of the Visual & Performing Arts">University of the Visual & Performing Arts</option>
                            <option value="Gampaha Wickramarachchi University of Indigenous Medicine">Gampaha Wickramarachchi University of Indigenous Medicine</option>
                            <option value="Institute of Technology University of Moratuwa">Institute of Technology University of Moratuwa</option>
                            <option value="University of Vauniya, Sri Lanka">University of Vauniya, Sri Lanka</option>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="AdmissionsFaculty">Choose your Faculty</label>
                        <select id="AdmissionsFaculty" name="faculty">
                            <option value="">-- Select Faculty --</option>
                            <option value="Faculty of Technology">Faculty of Technology</option>
                            <option value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                            <option value="Faculty of Agriculture">Faculty of Agriculture</option>
                            <option value="Faculty of Medicine">Faculty of Medicine</option>
                            <option value="Faculty of Engineering">Faculty of Engineering</option>
                            <option value="Faculty of Law">Faculty of Law</option>
                            <option value="Faculty of Business">Faculty of Business</option>
                            <option value="Faculty of Education">Faculty of Education</option>
                            <option value="Faculty of Social Sciences">Faculty of Social Sciences</option>
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