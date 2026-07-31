<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="../img/Brand/Favicon.svg">
    <title>GPA Calculator</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require 'navbar.php'; ?>
    <div class="GPA-container">
        <h1>GPA Calculator</h1>

        <div class="GPA-select">

            <p>Select Your university:</p>
            <select id="universitySelect">
                <option value="">-- Select University --</option>
                <option value="	University of Colombo"> University of Colombo</option>
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
                <option value="Gampaha Wickramarachchi University of Indigenous Medicine">Gampaha Wickramarachchi University of <br> <br> Indigenous Medicine</option>
                <option value="Institute of Technology University of Moratuwa">Institute of Technology University of Moratuwa</option>
                <option value="University of Vauniya, Sri Lankaa">University of Vauniya, Sri Lanka</option>
            </select>
            <div class="GPA-cours">
                <label for="GPA-cours" class="GPA-cours">Enter Course Code:</label>
                <input type="text" id="GPA-cours" name="GPA-cours" class="GPA-cours" placeholder="Type the course code here...">
            </div>
            <div>
                <p>Study Year:</p>
                <select>
                    <option value="">Select</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <div>
                <p>Semester:</p>
                <select>
                    <option value="">Select</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <div>
                <p>Select Your Credits:</p>
                <select>
                    <option value="">Select</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                    <option value="">None</option>
                </select>
            </div>
            <div>
                <p>Select Your Grade:</p>
                <select>
                    <option value="">Select</option>
                    <option value="Ap">A <sup>+</sup></option>
                    <option value="A">A</option>
                    <option value="An">A <sub>-</sub></option>
                    <option value="Bp">B <sup>+</sup></option>
                    <option value="B">B</option>
                    <option value="Bn">B <sub>-</sub></option>
                    <option value="Cp">C <sup>+</sup></option>
                    <option value="C">C</option>
                    <option value="Cn">C <sub>-</sub></option>
                    <option value="Dp">D <sup>+</sup></option>
                    <option value="D">D</option>
                    <option value="Dn">D <sub>-</sub></option>
                    <option value="E">E </option>
                    <option value="">None </option>


                </select>

            </div>
            <div class="GPA-Results">
                <div class="GPA-Results-achieve">
                    <img src="../img/icon/achieve.svg" alt="">
                </div>
                <p>Results</p>
                <div class="GPA-Results-calculator">
                    <img src="../img/icon/calculators.svg" alt="">
                </div>

            </div>


        </div>
    </div>
        <?php require 'Footer.php'; ?>

        <script src="../js/gpa_calculator.js"></script>



</body>

</html>