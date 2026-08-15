<?php $activePage = 'admission'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>uniScholar - Add University</title>
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
                    <input type="text" placeholder="Search admissions...">
                </div>
                <div class="Admin-topbar-profile">
                    <span>Admin</span>
                    <img src="../img/icon/graduated.png" alt="Admin">
                </div>
            </div>


            <h1 class="Admin-page-title">Add admission</h1>
            <p class="Admin-page-subtitle">Create a new admission listing on uniScholar.</p>

            <div class="Admin-panel">
                <div class="Admin-panel-header">
                    <h3>Admission Details</h3>
                    <a href="admin-admission.php">Back to Admissions</a>
                </div>

                <form class="Admin-settings-form" action="admin-admission-save.php" method="POST">

                    >

                    <div class="Admin-field">
                        <label for="AdmissionsName">Admission Name</label>
                        <input type="text" id="AdmissionsName"
                            name="admission_name"
                            value="admission_name"
                            placeholder="e.g. University of Colombo"
                            required>
                    </div>

                    <div class="Admin-field">
                        <label for="Admissionsuniversity">University</label>
                        <select id="universitySelect" name="university">
                            <option   name="admission_University" value="">-- Select University --</option>
                            <option name="University_of_Colombo" value="University of Colombo">University of Colombo</option>
                            <option name="University_of_Peradeniya" value="University of Peradeniya">University of Peradeniya</option>
                            <option name="University_of_Moratuwa" value="University of Moratuwa">University of Moratuwa</option>
                            <option name="University_of_Sri Jayewardenepura" value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                            <option name="University_of_Kelaniya" value="University of Kelaniya">University of Kelaniya</option>
                            <option name="University_of_Jaffna" value="University of Jaffna">University of Jaffna</option>
                            <option name="University_of_Ruhuna" value="University of Ruhuna">University of Ruhuna</option>
                            <option name="The_Open_University_of_Sri_Lanka" value="The Open University of Sri Lanka">The Open University of Sri Lanka</option>
                            <option name="Eastern_University_Sri_Lanka" value="Eastern University, Sri Lanka">Eastern University, Sri Lanka</option>
                            <option name="South_Eastern_University_of_Sri_Lanka" value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                            <option name="Rajarata_University_of_Sri_Lanka" value="Rajarata University of Sri Lanka">Rajarata University of Sri Lanka</option>
                            <option name="Sabaragamuwa_University_of_Sri_Lanka" value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                            <option name="Wayamba_University_of_Sri_Lanka" value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                            <option name="Uva_Wellassa_University" value="Uva Wellassa University">Uva Wellassa University</option>
                            <option name="University_of_the_Visual_&_Performing_Arts" value="University of the Visual & Performing Arts">University of the Visual & Performing Arts</option>
                            <option name="Gampaha_Wickramarachchi_University_of_Indigenous_Medicine" value="Gampaha Wickramarachchi University of Indigenous Medicine">Gampaha Wickramarachchi University of Indigenous Medicine</option>
                            <option name="Institute_of_Technology_University_of_Moratuwa" value="Institute of Technology University of Moratuwa">Institute of Technology University of Moratuwa</option>
                            <option name="University_of_Vauniya_Sri_Lanka" value="University of Vauniya, Sri Lanka">University of Vauniya, Sri Lanka</option>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="AdmissionsFaculty">Choose your Faculty</label>
                        <select id="AdmissionsFaculty" name="faculty">
                            <option value="">-- Select Faculty --</option>
                            <option name="Faculty_of_Technology" value="Faculty of Technology">Faculty of Technology</option>
                            <option name="Faculty_of_Applied_Sciences" value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                            <option name="Faculty_of_Agriculture" value="Faculty of Agriculture">Faculty of Agriculture</option>
                            <option name="Faculty_of_Medicine" value="Faculty of Medicine">Faculty of Medicine</option>
                            <option name="Faculty_of_Engineering" value="Faculty of Engineering">Faculty of Engineering</option>
                            <option name="Faculty_of_Law" value="Faculty of Law">Faculty of Law</option>
                            <option name="Faculty_of_Business" value="Faculty of Business">Faculty of Business</option>
                            <option name="Faculty_of_Education" value="Faculty of Education">Faculty of Education</option>
                            <option name="Faculty_of_Social_Sciences" value="Faculty of Social Sciences">Faculty of Social Sciences</option>
                        </select>
                    </div>

                    <div class="Admin-field">
                        <label for="AdmissionsStatus">Status</label>
                        <select id="AdmissionsStatus" name="status">
                            <option  name="Status" value="Status" selected>-- Select Status --</option>
                            <option name="Status" value="active" selected>Active</option>
                            <option name="inactive" value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="Admin-field">
                        <label for="AdmissionsStudyYear">Study Year</label>
                        <input type="text" id="StudyYear:" name="Study_Year:" placeholder="e.g. 2024" required>
                        </select>
                    </div>
                    <div class="Admin-field">
                        <label for="AdmissionsSemester">Semester</label>
                        <select id="AdmissionsSemester" name="semester">
                            <option name="Semester_1" value="1" selected>1</option>
                            <option name="Semester_2" value="2">2</option>
                        </select>
                    </div>

                    <div class="Admin-field Admin-field-full">
                        <label for="AdmissionsDescription">Description</label>
                        <textarea id="AdmissionsDescription" name="description" placeholder="Short description of the admission..."></textarea>
                    </div>

                    <div class="Admin-settings-actions">
                        <a href="admin-admissions.php" class="Admin-btn Admin-btn-secondary" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">Cancel</a>
                        <button type="submit" class="Admin-btn Admin-btn-primary" name="admission"
                            value="admission">Add Admission</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <?php require 'Footer.php'; ?>

</body>

</html>