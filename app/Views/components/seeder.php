<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="index.html" class="d-block text-decoration-none">
            <img src="<?= base_url('admin') ?>/assets/images/logo-icon.png" alt="logo-icon">
            <span class="logo-text fw-bold text-dark">Farol</span>
        </a>
        <button class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y" id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        <ul class="menu-inner">
            <li class="menu-item">
                <a href="/" class="menu-link">
                    <i data-feather="grid" class="menu-icon tf-icons"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">PAGES</span>
            </li>
            <li class="menu-item">
                <a href="/jurusan" class="menu-link">
                    <i data-feather="book" class="menu-icon tf-icons"></i>
                    <span class="title">Juruasan</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="/mahasiswa" class="menu-link">
                    <i data-feather="users" class="menu-icon tf-icons"></i>
                    <span class="title">Mahasiswa</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="/operator" class="menu-link">
                    <i data-feather="tool" class="menu-icon tf-icons"></i>
                    <span class="title">Operator</span>
                </a>
            </li>
        </ul>
    </aside>
    <div class="bg-white z-1 admin">
        <div class="d-flex align-items-center admin-info border-top">
            <div class="flex-shrink-0">
                <a href="profile.html" class="d-block">
                    <img src="<?= base_url('admin') ?>/assets/images/admin.jpg" class="rounded-circle wh-54" alt="admin">
                </a>
            </div>
            <div class="flex-grow-1 ms-3 info">
                <a href="profile.html" class="d-block name">Adison Jeck</a>
                <a href="logout.html">Log Out</a>
            </div>
        </div>
    </div>
</div>