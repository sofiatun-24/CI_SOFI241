<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            PT Maju Jaya
            <div style="font-size:10px; font-weight:400; opacity:.6; margin-top:1px;">
                Sales Order System
            </div>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- ADMIN ONLY: Master Data -->
    <?php if ($this->session->userdata('role') == 'admin'): ?>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">Master Data</div>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('produk') ?>">
                <i class="fas fa-fw fa-box"></i>
                <span>Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('pelanggan') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Pelanggan</span>
            </a>
        </li>



    <?php endif; ?>

    <!-- ADMIN & SALES: Transaksi -->
    <?php if (in_array($this->session->userdata('role'), ['admin', 'sales'])): ?>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">Transaksi</div>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('salesorder') ?>">
                <i class="fas fa-fw fa-file-invoice"></i>
                <span>Sales Order</span>
            </a>
        </li>

    <?php endif; ?>

    <!-- ADMIN & MANAGER: Laporan -->
    <?php if (in_array($this->session->userdata('role'), ['admin', 'manager'])): ?>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">Laporan</div>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('laporan') ?>">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Laporan Penjualan</span>
            </a>
        </li>

    <?php endif; ?>

    <!-- Logout -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('auth/logout') ?>"
           onclick="return confirm('Yakin ingin logout?')">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- User Info Card -->
    <div class="text-center d-none d-md-inline-block" style="padding:10px 12px 16px; width:100%;">
        <div style="background:rgba(255,255,255,.1); border-radius:10px; padding:12px 10px;">
            <div style="width:38px; height:38px; border-radius:50%; background:rgba(255,255,255,.25);
                        display:flex; align-items:center; justify-content:center;
                        font-weight:700; color:#fff; font-size:15px; margin:0 auto 8px;">
                <?= strtoupper(substr($this->session->userdata('nama'), 0, 1)) ?>
            </div>
            <div style="color:#fff; font-size:12px; font-weight:700; margin-bottom:2px;">
                <?= $this->session->userdata('nama') ?>
            </div>
            <div style="color:rgba(255,255,255,.55); font-size:10px;">
                <?= ucfirst($this->session->userdata('role')) ?>
            </div>
        </div>
    </div>

</ul>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">