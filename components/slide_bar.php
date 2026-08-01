<?php
if (!isset($activePage)) {
    $activePage = '';
}
?>

<!-- Mobile top bar (shown only on small screens) -->
<div class="Admin-mobile-topbar">
    <button class="Admin-toggle-btn" id="sidebarToggle" type="button">
        <span></span><span></span><span></span>
    </button>
    <span class="Admin-mobile-brand">uniScholar Admin</span>
</div>

<aside class="Admin-sidebar" id="adminSidebar">
    <div class="Admin-sidebar-brand">
        <img src="../img/Brand/Favicon-White.svg" alt="uniScholar" class="Admin-sidebar-logo">
        <div>
            <h3>uniScholar</h3>
            <h6>Admin Panel</h6>
        </div>
    </div>

    <nav class="Admin-nav">
        <ul>
            <li class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>">
                <a href="admin-dashboard.php"><img src="../img/icon/dashboard" alt=""> Dashboard</a>
            </li>
            <li class="<?php echo $activePage === 'students' ? 'active' : ''; ?>">
                <a href="admin-students.php"><<img src="" alt=""> Students</a>
            </li>
            <li class="<?php echo $activePage === 'universities' ? 'active' : ''; ?>">
                <a href="admin-universities.php"><<img src="" alt=""> Universities</a>
            </li>
            <li class="<?php echo $activePage === 'courses' ? 'active' : ''; ?>">
                <a href="admin-courses.php"><<img src="" alt=""> Courses</a>
            </li>
            <li class="<?php echo $activePage === 'scholarships' ? 'active' : ''; ?>">
                <a href="admin-scholarships.php"><<img src="" alt=""> Scholarships</a>
            </li>
            <li class="<?php echo $activePage === 'resources' ? 'active' : ''; ?>">
                <a href="admin-resources.php"><<img src="" alt=""> Resources</a>
            </li>
            <li class="<?php echo $activePage === 'settings' ? 'active' : ''; ?>">
                <a href="admin-settings.php"><<img src="" alt=""> Settings</a>
            </li>
        </ul>
    </nav>

    <div class="Admin-sidebar-footer">
        <a href="logout.php" class="Admin-logout-link">
            <img src="" alt=""> Logout
        </a>
    </div>
</aside>

<div class="Admin-overlay" id="adminOverlay"></div>
