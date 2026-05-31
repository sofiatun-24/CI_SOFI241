<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
    /* === WARNA TEMA: HIJAU & PINK PASTEL === */
    :root {
        --green:        #3dbb85;
        --green-dark:   #2a9e6e;
        --green-light:  #e8f8f2;
        --green-mid:    #c2edd9;
        --pink:         #e97fa8;
        --pink-dark:    #d4608e;
        --pink-light:   #fce8f1;
        --pink-mid:     #f5c2d8;
        --mint:         #f0faf6;
        --blush:        #fdf0f6;
    }

    body { background-color: #f7faf9 !important; }

    .hero-card {
        background: linear-gradient(135deg, var(--green), var(--green-dark));
        border-radius: 18px;
        padding: 28px 32px;
        color: #fff;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .hero-card::before {
        content: "";
        position: absolute;
        width: 200px; height: 200px;
        background: rgba(255,255,255,.08);
        border-radius: 50%;
        right: -50px; top: -80px;
    }
    .hero-card::after {
        content: "";
        position: absolute;
        width: 140px; height: 140px;
        background: rgba(255,255,255,.06);
        border-radius: 50%;
        right: 80px; bottom: -60px;
    }
    .hero-content { position: relative; z-index: 2; }

    /* stat cards */
    .stat-card {
        border: none;
        border-radius: 14px;
        transition: .25s;
        box-shadow: 0 4px 14px rgba(0,0,0,.06);
    }
    .stat-card:hover { transform: translateY(-3px); }

    .stat-green  { border-left: 4px solid var(--green) !important; }
    .stat-pink   { border-left: 4px solid var(--pink)  !important; }
    .stat-gmid   { border-left: 4px solid #6ecfaa !important; }
    .stat-pmid   { border-left: 4px solid #f0a3c4 !important; }

    .ic-green { color: var(--green); }
    .ic-pink  { color: var(--pink); }
    .ic-gmid  { color: #6ecfaa; }
    .ic-pmid  { color: #f0a3c4; }

    .lbl-green { color: var(--green-dark) !important; }
    .lbl-pink  { color: var(--pink-dark)  !important; }
    .lbl-gmid  { color: #4dac87 !important; }
    .lbl-pmid  { color: #d4608e !important; }

    /* menu cards */
    .menu-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,.06);
        transition: .25s;
        height: 100%;
    }
    .menu-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,.1); }

    .menu-icon-wrap {
        width: 62px; height: 62px;
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 14px;
        font-size: 26px;
    }

    /* btn pastel */
    .btn-green {
        background: var(--green); color: #fff; border: none;
        border-radius: 8px;
    }
    .btn-green:hover { background: var(--green-dark); color: #fff; }

    .btn-pink {
        background: var(--pink); color: #fff; border: none;
        border-radius: 8px;
    }
    .btn-pink:hover { background: var(--pink-dark); color: #fff; }

    .btn-mint {
        background: #6ecfaa; color: #fff; border: none;
        border-radius: 8px;
    }
    .btn-mint:hover { background: #4dac87; color: #fff; }

    .btn-blush {
        background: #f0a3c4; color: #fff; border: none;
        border-radius: 8px;
    }
    .btn-blush:hover { background: #d4608e; color: #fff; }
</style>

<!-- HERO -->
<div class="hero-card">
    <div class="hero-content">
        <p class="mb-1" style="opacity:.8; font-size:13px;">
            <i class="fas fa-circle mr-1" style="color:#a8f0d4; font-size:9px;"></i>
            <?= date('l, d F Y') ?>
        </p>
        <h4 class="font-weight-bold mb-1">
            Selamat Datang, <?= $nama ?>!
        </h4>
        <p class="mb-0" style="opacity:.85; font-size:13px;">
            Anda login sebagai
            <span style="background:rgba(255,255,255,.22); padding:2px 12px; border-radius:99px; font-weight:600;">
                <?= ucfirst($role) ?>
            </span>
        </p>
    </div>
</div>

<!-- STAT CARDS (admin only) -->
<?php if ($role == 'admin'): ?>
<div class="row mb-4">

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-green py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-file-invoice fa-2x ic-green"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-green text-uppercase mb-1">Total Order</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_order ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-pink py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-check-circle fa-2x ic-pink"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-pink text-uppercase mb-1">Order Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order_selesai ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-gmid py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-box fa-2x ic-gmid"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-gmid text-uppercase mb-1">Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_produk ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card stat-pmid py-2">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-users fa-2x ic-pmid"></i>
                    </div>
                    <div>
                        <div class="text-xs font-weight-bold lbl-pmid text-uppercase mb-1">Total Pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pelanggan ?? 0 ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php endif; ?>

<!-- MENU CARDS -->
<div class="row">

    <?php if ($role == 'admin'): ?>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card menu-card text-center p-4">
            <div class="menu-icon-wrap" style="background:var(--green-light);">
                <i class="fas fa-box ic-green"></i>
            </div>
            <h6 class="font-weight-bold mb-1">Produk</h6>
            <p class="text-muted small mb-3">Kelola data produk & stok</p>
            <a href="<?= site_url('produk') ?>" class="btn btn-green btn-sm">
                Buka <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card menu-card text-center p-4">
            <div class="menu-icon-wrap" style="background:var(--pink-light);">
                <i class="fas fa-users ic-pink"></i>
            </div>
            <h6 class="font-weight-bold mb-1">Pelanggan</h6>
            <p class="text-muted small mb-3">Kelola data pelanggan</p>
            <a href="<?= site_url('pelanggan') ?>" class="btn btn-pink btn-sm">
                Buka <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card menu-card text-center p-4">
            <div class="menu-icon-wrap" style="background:#e0f7ef;">
                <i class="fas fa-user-cog ic-gmid"></i>
            </div>
            <h6 class="font-weight-bold mb-1">User</h6>
            <p class="text-muted small mb-3">Manajemen akun pengguna</p>
            <a href="<?= site_url('user') ?>" class="btn btn-mint btn-sm">
                Buka <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <?php endif; ?>

    <?php if (in_array($role, ['admin', 'sales'])): ?>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card menu-card text-center p-4">
            <div class="menu-icon-wrap" style="background:#fce8f1;">
                <i class="fas fa-file-invoice ic-pmid"></i>
            </div>
            <h6 class="font-weight-bold mb-1">Sales Order</h6>
            <p class="text-muted small mb-3">Buat dan kelola pesanan</p>
            <a href="<?= site_url('salesorder') ?>" class="btn btn-blush btn-sm">
                Buka <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <?php endif; ?>

    <?php if (in_array($role, ['admin', 'manager'])): ?>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card menu-card text-center p-4">
            <div class="menu-icon-wrap" style="background:var(--green-light);">
                <i class="fas fa-chart-bar ic-green"></i>
            </div>
            <h6 class="font-weight-bold mb-1">Laporan</h6>
            <p class="text-muted small mb-3">Rekap & ekspor laporan PDF</p>
            <a href="<?= site_url('laporan') ?>" class="btn btn-green btn-sm">
                Buka <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <?php endif; ?>

</div>

</div><!-- end container-fluid -->

<?php $this->load->view('templates/footer'); ?>