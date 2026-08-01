<?php
// components/admin-sidebar.php
// Me file eka admin pages okkoma athule include karanna.
// Active link eka auto-highlight wenna, oya page ekema top ekata me variable eka danna:
//   $activePage = 'dashboard'; // 'students' | 'universities' | 'courses' | 'scholarships' | 'resources' | 'settings'
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
                <a href="admin-dashboard.php"><img src="../img/icon/dashboard.svg" alt="" class="Admin-icon-img"> Dashboard</a>
            </li>
            <li class="<?php echo $activePage === 'search' ? 'active' : ''; ?>">
                <a href="admin-search.php"><img src="../img/icon/students.svg" alt="" class="Admin-icon-img"> Search</a>
            </li>
            <li class="<?php echo $activePage === 'student' ? 'active' : ''; ?>">
                <a href="admin-student.php"><img src="../img/icon/universities.svg" alt="" class="Admin-icon-img"> Student</a>
            </li>
            <li class="<?php echo $activePage === 'classroom' ? 'active' : ''; ?>">
                <a href="admin-classroom.php"><img src="../img/icon/courses.svg" alt="" class="Admin-icon-img"> Classroom</a>
            </li>
            <li class="<?php echo $activePage === 'admission' ? 'active' : ''; ?>">
                <a href="admin-admission.php"><img src="../img/icon/scholarships.svg" alt="" class="Admin-icon-img"> Admission</a>
            </li>
            <li class="<?php echo $activePage === 'resources' ? 'active' : ''; ?>">
                <a href="admin-resources.php"><img src="../img/icon/resources.svg" alt="" class="Admin-icon-img"> Resources</a>
            </li>
            <li class="<?php echo $activePage === 'settings' ? 'active' : ''; ?>">
                <a href="admin-settings.php"><img src="../img/icon/settings.svg" alt="" class="Admin-icon-img"> Settings</a>
            </li>
        </ul>
    </nav>

    <div class="Admin-sidebar-footer">
        <a href="logout.php" class="Admin-logout-link">
            <img src="../img/icon/logout.svg" alt="" class="Admin-icon-img"> Logout
        </a>
    </div>
</aside>

<div class="Admin-overlay" id="adminOverlay"></div>