<?php $activePage = 'course'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Add Course</title>
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
                    <input type="text" placeholder="Search courses...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>

            <h1 class="Admin-page-title">Add Course</h1>
            <p class="Admin-page-subtitle">Create a new course to list on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>Course Details</h3>
                    <a href="admin-course.php">Back to Courses</a>
                </div>

                <form class="Admin-settings-form" action="admin-course-save.php" method="post">

                    <div class="Admin-field">
                        <label for="courseCode">Course Code</label>
                        <input type="text" id="courseCode" name="code" placeholder="e.g. CS1012" required>
                    </div>

                    <div class="Admin-field">
                        <label for="courseName">Course Name</label>
                        <input type="text" id="courseName" name="name" placeholder="e.g. Data Structures" required>
                    </div>

                    <div class="Admin-field">
                        <label for="courseUniversity">University</label>
                        <select id="courseUniversity" name="university" required>
                            <option value="">-- Select University --</option>
                            <?php
                            $universities = [
                                'University of Colombo',
                                'University of Peradeniya',
                                'University of Moratuwa',
                                'University of Sri Jayewardenepura',
                                'University of Kelaniya',
                                'University of Jaffna',
                                'University of Ruhuna',
                                'The Open University of Sri Lanka',
                                'Eastern University Sri Lanka',
                                'South Eastern University of Sri Lanka',
                                'Rajarata University of Sri Lanka',
                                'Sabaragamuwa University of Sri Lanka',
                                'Wayamba University of Sri Lanka',
                                'Uva Wellassa University of Sri Lanka',
                                'University of the Visual & Performing Arts',
                                'Gampaha Wickramarachchi University of Indigenous Medicine',
                                'Institute of Technology University of Moratuwa',
                                'University of Vauniya, Sri Lanka',
                            ];
                            foreach ($universities as $uni):
                            ?>
                                <option value="<?php echo htmlspecialchars($uni); ?>"><?php echo htmlspecialchars($uni); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="courseCredits">Credits</label>
                        <select id="courseCredits" name="credits" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="courseSemester">Semester</label>
                        <select id="courseSemester" name="semester" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="courseStatus">Status</label>
                        <select id="courseStatus" name="status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="Admin-field Admin-field-full">
                        <label for="courseDescription">Description</label>
                        <textarea id="courseDescription" name="description" placeholder="Short description of the course..."></textarea>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="admin-courses.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Cancel</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary">Add Course</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>