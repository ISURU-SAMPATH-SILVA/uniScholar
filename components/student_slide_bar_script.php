<script>
    const sidebar = document.getElementById('adminSidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('adminOverlay');


    if (sidebar && toggleBtn && overlay) {
        function openSidebar() {
            sidebar.classList.add('Admin-sidebar-open');
            overlay.classList.add('Admin-overlay-show');
        }

        function closeSidebar() {
            sidebar.classList.remove('Admin-sidebar-open');
            overlay.classList.remove('Admin-overlay-show');
        }

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.contains('Admin-sidebar-open') ? closeSidebar() : openSidebar();
        });

        overlay.addEventListener('click', closeSidebar);
    } else {
        console.warn('Admin sidebar script: sidebar elements not found on this page. Make sure components/admin-sidebar.php is included.');
    }
</script>