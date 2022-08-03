        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Tugas Besar</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Master</div>
                            <a class="nav-link" href="<?= base_url('employees') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Karyawan
                            </a>
                            <a class="nav-link" href="<?= base_url('material_categories') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori Material
                            </a>
                            <a class="nav-link" href="<?= base_url('suppliers') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Supplier
                            </a>
                            <a class="nav-link" href="<?= base_url('materials') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Material
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Transaksi</div>
                            <a class="nav-link" href="<?= base_url('purchases') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Pembelian
                            </a>
                            <a class="nav-link" href="<?= base_url('sales') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Penjualan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>