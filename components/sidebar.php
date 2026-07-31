<div class="container-fluid">
    <div class="row">
        
        <!-- 1. Sidebar එක (වම්පස තීරුව) -->
        <div class="col-md-3 col-lg-2 d-md-block bg-dark text-white min-vh-100 p-3">
            <h5 class="text-center mb-4">uniScholar</h5>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white active">Dashboard</a>
                </li>
                <li>
                    <a href="course.php" class="nav-link text-white">Courses</a>
                </li>
                <li>
                    <a href="register.php" class="nav-link text-white">Register</a>
                </li>
            </ul>
        </div>

        <!-- 2. Main Content එක (මෙහි මැදට තමයි පරණ component එක දාන්නේ) -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5 bg-light min-vh-100 d-flex justify-content-center align-items-center">
            
            <!-- මෙන්න මේ කොටස ඇතුළට ඔබේ කලින් හදපු component එක (Login Card එක) paste කරන්න -->
            <div class="Login-card p-4 shadow-sm bg-white rounded" style="max-width: 450px; width: 100%;">
                
                <form action="#">
                    <div class="Login-input-group mb-3">
                        <label for="confirm-pass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-pass" placeholder="********" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3 Login-btn">Register</button>

                    <button type="button" class="btn btn-outline-danger w-100 Login-btn btn-google">
                        Login With Google
                    </button>
                </form>

                <p class="Login-footer-text text-center mt-3">
                    Already have an account? <a href="login.php">Login</a>
                </p>

            </div>
            <!-- කලින් හදපු component එකේ අවසානය -->

        </div>
    </div>
</div>
