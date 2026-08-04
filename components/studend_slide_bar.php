<?php

if (!isset($activePage)) {
    $activePage = '';
}
?>


<div class="Admin-mobile-topbar">
    <button class="Admin-toggle-btn" id="sidebarToggle" type="button">
        <span></span><span></span><span></span>
    </button>
    <span class="Admin-mobile-brand">uniScholar Student</span>
</div>

<aside class="Admin-sidebar" id="adminSidebar">
    <div class="Admin-sidebar-brand">
        <img src="../img/Brand/Favicon-White.svg" alt="uniScholar" class="Admin-sidebar-logo">
        <div>
            <h3>uniScholar</h3>
            <h6>Student Panel</h6>
        </div>
    </div>

    <nav class="Admin-nav">
        <ul>
            <li class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <a href="student_dashbord.php"><img src="../img/icon/dashboard.png" alt="" class="Admin-icon-img"> Dashboard</a>
            </li>
            <li class="<?php echo $activePage === 'search' ? 'active' : ''; ?>">
                <a href="student_search.php
                "><img src="../img/icon/loupe.png" alt="" class="Admin-icon-img"> Search</a>
            </li>

            <li class="<?php echo $activePage === 'classroom' ? 'active' : ''; ?>">
                <a href="student-classroom.php"><img src="../img/icon/home.png" alt="" class="Admin-icon-img"> Classroom</a>
            </li>

            <li class="<?php echo $activePage === 'admission' ? 'active' : ''; ?>">
                <a href="student-broadcast.php"><img src="../img/icon/messages.png" alt="" class="Admin-icon-img"> Admission</a>
            </li>

        </ul>
    </nav>

    <div class="Admin-sidebar-footer">
        <a href="logout.php" class="Admin-logout-link">
            <img src="../img/icon/power.png" alt="" class="Admin-icon-img"> Logout
        </a>
    </div>
</aside>

<div class="Admin-overlay" id="adminOverlay"></div>