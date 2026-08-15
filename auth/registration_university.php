<!DOCTYPE html>
<html lang="si">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">

    <title>uniScholar - Register</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/bootstrap.bundle.min.js" defer></script>
</head>

<body>

    <div class="Login-card">

        <!-- Logo -->
        <div class="Login-avatar-box">
            <img
                src="../img/Brand/Favicon-White.svg"
                alt="uniScholar Logo"
            >
        </div>

        <h1 class="Login-brand-name">
            uniScholar
        </h1>

        <h2 class="Login-form-title">
            REGISTER
        </h2>


        <form
            action="../database/registration_university.php"
            method="POST"
        >

    
            <div class="row">

                <div class="Login-input-group">

                   
                  <div class="Admin-field">
                        <label for="Admissionsuniversity"> University Name</label>
                        <select id="universitySelect" name="university">
                            <option   name="" value="none">-- Select University --</option>
                            <option name="univerity" value="University of Colombo">University of Colombo</option>
                            <option name="univerity" value="University of Peradeniya">University of Peradeniya</option>
                            <option name="univerity" value="University of Moratuwa">University of Moratuwa</option>
                            <option name="univerity" value="University of Sri Jayewardenepura">University of Sri Jayewardenepura</option>
                            <option name="univerity" value="University of Kelaniya">University of Kelaniya</option>
                            <option name="univerity" value="University of Jaffna">University of Jaffna</option>
                            <option name="univerity" value="University of Ruhuna">University of Ruhuna</option>
                            <option name="univerity" value="The Open University of Sri Lanka">The Open University of Sri Lanka</option>
                            <option name="univerity" value="Eastern University, Sri Lanka">Eastern University, Sri Lanka</option>
                            <option name="univerity" value="South Eastern University of Sri Lanka">South Eastern University of Sri Lanka</option>
                            <option name="univerity" value="Rajarata University of Sri Lanka">Rajarata University of Sri Lanka</option>
                            <option name="univerity" value="Sabaragamuwa University of Sri Lanka">Sabaragamuwa University of Sri Lanka</option>
                            <option name="univerity" value="Wayamba University of Sri Lanka">Wayamba University of Sri Lanka</option>
                            <option name="univerity" value="Uva Wellassa University">Uva Wellassa University</option>
                            <option name="univerity" value="University of the Visual & Performing Arts">University of the Visual & Performing Arts</option>
                            <option name="univerity" value="Gampaha Wickramarachchi University of Indigenous Medicine">Gampaha Wickramarachchi University of Indigenous Medicine</option>
                            <option name="univerity" value="Institute of Technology University of Moratuwa">Institute of Technology University of Moratuwa</option>
                            <option name="univerity" value="University of Vauniya, Sri Lanka">University of Vauniya, Sri Lanka</option>
                        </select>
                    </div>
                   <div class="Admin-field">
                        <label for="AdmissionsFaculty">Faculty Name</label>
                        <select id="AdmissionsFaculty" name="faculty">
                            <option value="none">-- Select Faculty --</option>
                            <option name="faculty_name" value="Faculty of Technology">Faculty of Technology</option>
                            <option name="faculty_name" value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                            <option name="faculty_name" value="Faculty of Agriculture">Faculty of Agriculture</option>
                            <option name="faculty_name" value="Faculty of Medicine">Faculty of Medicine</option>
                            <option name="faculty_name" value="Faculty of Engineering">Faculty of Engineering</option>
                            <option name="faculty_name" value="Faculty of Law">Faculty of Law</option>
                            <option name="faculty_name" value="Faculty of Business">Faculty of Business</option>
                            <option name="faculty_name" value="Faculty of Education">Faculty of Education</option>
                            <option name="faculty_name" value="Faculty of Social Sciences">Faculty of Social Sciences</option>
                        </select>
                    </div>
                  <div class="Login-input-group">

                    <label for="confirm-pass">
                    Confirm Password
                    </label>

                   <input
                    type="text"
                    id="study_year"
                    name="study_year"
                    placeholder="2024"
                    minlength="4"
                    required
                   >

                 </div>
                   
                    <div class="Admin-field">
                        <label for="AdmissionsSemester">Semester</label>
                        <select id="AdmissionsSemester" name="semester">
                            <option name="Semester" value="1" selected>1</option>
                            <option name="Semester" value="2">2</option>
                        </select>
                    </div>


                </div>
                 
            </div>


        


            

            <!-- Register Button -->
            <button
                type="submit"
                class="Login-btn Login-btn-primary"
                name="register"
                value="register"
            >
                Register
            </button>

        </form>


        <!-- Login Link -->
        <p class="Login-footer-text">

            Already have an account?

            <a href="Login.php">
                Login
            </a>

        </p>

    </div>

</body>

</html>