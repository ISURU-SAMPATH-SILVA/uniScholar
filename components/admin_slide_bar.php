<?php

if (!isset($activePage)) {
    $activePage = '';
}
?>


<div class="Admin-mobile-topbar">
    <button class="Admin-toggle-btn" id="sidebarToggle" type="button">
        <span></span><span></span><span></span>
    </button>
    <span class="Admin-mobile-brand">uniScholar Admin</span>
</div>

<aside class="Admin-sidebar" id="adminSidebar">
    <div class="Admin-sidebar-brand"> <a href="../index.php">
        <img src="../img/Brand/Favicon-White.svg" alt="uniScholar" class="Admin-sidebar-logo">
        <div>
            <h3>uniScholar</h3>
            <h6>Admin Panel</h6>
        </div>
        </a>
    </div>

    <nav class="Admin-nav">
        <ul>
            <li class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <a href="admin_dashbord.php"><img src="../img/icon/dashboard.png" alt="" class="Admin-icon-img"> Dashboard</a>
            </li>
            <li class="<?php echo $activePage === 'search' ? 'active' : ''; ?>">
                <a href="admin_search.php"><img src="../img/icon/loupe.png" alt="" class="Admin-icon-img"> Search</a>
            </li>
           
            <li class="<?php echo $activePage === 'classroom' ? 'active' : ''; ?>">
                <a href="admin_classroom.php"><img src="../img/icon/home.png" alt="" class="Admin-icon-img"> Classroom</a>
            </li>
          
           
            <li class="<?php echo $activePage === 'course' ? 'active' : ''; ?>">
                <a href="admin-course.php"><img src="../img/icon/folder.png" alt="" class="Admin-icon-img"> Course</a>
            </li>
        </ul>
    </nav>

    <div class="Admin-sidebar-footer">
        <a href="../auth/logout.php" class="Admin-logout-link">
            <img src="../img/icon/power.png" alt="" class="Admin-icon-img"> Logout
        </a>
    </div>
</aside>

<div class="Admin-overlay" id="adminOverlay"></div>