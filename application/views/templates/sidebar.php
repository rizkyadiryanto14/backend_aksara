<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/images/aksara_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Belajar Aksara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user text-white pt-2"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/content') ?>" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Content</p>
                    </a>
                </li>
                <!-- Additional items -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/users') ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/tambah_kuis') ?>" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Quis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/settings') ?>" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-item');

        navLinks.forEach(function(navLink) {
            navLink.addEventListener('click', function() {
                // Remove 'nav-open' class from all nav items
                navLinks.forEach(function(link) {
                    link.classList.remove('nav-open');
                });
                // Add 'nav-open' class to the clicked nav item
                this.classList.add('nav-open');
            });
        });
    });
</script>