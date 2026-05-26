<link href="<?= base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

.dashboard-wrapper *{
    font-family:'Inter',sans-serif;
}

.dashboard-wrapper{
    padding:22px;
    background:#eef2f7;
    min-height:100vh;
}

/* HERO */
.dashboard-hero{
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#ec4899);
    border-radius:26px;
    padding:28px;
    color:#fff;
    margin-bottom:24px;
    position:relative;
    overflow:hidden;
    box-shadow:0 18px 40px rgba(79,70,229,.25);
}

.dashboard-hero::before{
    content:"";
    position:absolute;
    width:260px;
    height:260px;
    background:rgba(255,255,255,.13);
    border-radius:50%;
    right:-70px;
    top:-90px;
}

.dashboard-hero::after{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,.10);
    border-radius:50%;
    left:45%;
    bottom:-110px;
}

.hero-content{
    position:relative;
    z-index:2;
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:8px 14px;
    border-radius:999px;
    background:rgba(255,255,255,.18);
    font-size:12px;
    font-weight:700;
    margin-bottom:14px;
}

.hero-title{
    font-size:32px;
    font-weight:800;
    letter-spacing:-.8px;
    margin-bottom:8px;
}

.hero-subtitle{
    max-width:620px;
    font-size:14px;
    opacity:.92;
    line-height:1.7;
}

.hero-mini-card{
    background:rgba(255,255,255,.18);
    border:1px solid rgba(255,255,255,.25);
    border-radius:20px;
    padding:18px;
    backdrop-filter:blur(12px);
    height:100%;
    text-align:center;
}

.hero-mini-label{
    font-size:12px;
    opacity:.85;
    margin-bottom:8px;
}

.hero-mini-number{
    font-size:26px;
    font-weight:800;
}

/* STAT CARD */
.stat-card{
    background:#fff;
    border-radius:22px;
    padding:22px;
    border:1px solid #e2e8f0;
    height:100%;
    transition:.25s ease;
    box-shadow:0 8px 22px rgba(15,23,42,.05);
    position:relative;
    overflow:hidden;
}

.stat-card:hover{
    transform:translateY(-4px);
    box-shadow:0 16px 32px rgba(15,23,42,.09);
}

.stat-card::after{
    content:"";
    position:absolute;
    width:85px;
    height:85px;
    border-radius:50%;
    right:-30px;
    top:-30px;
    opacity:.13;
}

.stat-card.purple::after{background:#6366f1;}
.stat-card.green::after{background:#10b981;}
.stat-card.orange::after{background:#f59e0b;}
.stat-card.blue::after{background:#0ea5e9;}

.stat-top{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:18px;
}

.stat-icon{
    width:54px;
    height:54px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.stat-label{
    font-size:12px;
    font-weight:700;
    color:#64748b;
    text-transform:uppercase;
    letter-spacing:.8px;
    margin-bottom:8px;
}

.stat-number{
    font-size:34px;
    font-weight:800;
    color:#0f172a;
    line-height:1;
}

.stat-desc{
    margin-top:10px;
    font-size:13px;
    color:#64748b;
}

/* PANEL */
.panel-card{
    background:#fff;
    border-radius:22px;
    border:1px solid #e2e8f0;
    box-shadow:0 8px 22px rgba(15,23,42,.05);
    overflow:hidden;
    height:100%;
}

.panel-header{
    padding:18px 22px;
    border-bottom:1px solid #e2e8f0;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.panel-title{
    font-size:15px;
    font-weight:800;
    color:#0f172a;
}

.panel-subtitle{
    font-size:12px;
    color:#64748b;
    margin-top:3px;
}

.panel-body{
    padding:22px;
}

/* QUICK MENU */
.quick-menu{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:14px;
}

.quick-item{
    padding:16px;
    border-radius:18px;
    background:#f8fafc;
    border:1px solid #e2e8f0;
    text-decoration:none !important;
    color:#0f172a;
    transition:.22s ease;
    display:block;
}

.quick-item:hover{
    text-decoration:none;
    color:#0f172a;
    background:#eef2ff;
    transform:translateY(-2px);
}

.quick-icon{
    width:42px;
    height:42px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:12px;
}

.quick-title{
    font-size:13px;
    font-weight:800;
}

.quick-desc{
    font-size:12px;
    color:#64748b;
    margin-top:3px;
}

/* ACTIVITY */
.activity-item{
    display:flex;
    gap:12px;
    padding:13px 0;
    border-bottom:1px solid #e2e8f0;
}

.activity-item:last-child{
    border-bottom:none;
}

.activity-dot{
    width:11px;
    height:11px;
    border-radius:50%;
    margin-top:5px;
    flex:none;
}

.activity-title{
    font-size:13px;
    font-weight:700;
    color:#0f172a;
}

.activity-time{
    font-size:12px;
    color:#64748b;
    margin-top:3px;
}

/* PROGRESS */
.progress-list{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.progress-info{
    display:flex;
    justify-content:space-between;
    font-size:13px;
    margin-bottom:8px;
}

.progress-name{
    font-weight:700;
    color:#0f172a;
}

.progress-percent{
    color:#64748b;
    font-weight:700;
}

.progress{
    height:9px;
    border-radius:999px;
    background:#e2e8f0;
}

.progress-bar{
    border-radius:999px;
}

/* CHART */
.chart-card{
    background:#fff;
    border-radius:22px;
    border:1px solid #e2e8f0;
    overflow:hidden;
    box-shadow:0 8px 22px rgba(15,23,42,.05);
}

.chart-header{
    padding:18px 22px;
    border-bottom:1px solid #e2e8f0;
    display:flex;
    align-items:center;
    gap:10px;
}

.chart-title{
    font-size:15px;
    font-weight:800;
    color:#0f172a;
}

.chart-body{
    padding:24px;
}

canvas{
    max-height:330px;
}

/* RESPONSIVE */
@media(max-width:768px){

    .dashboard-wrapper{
        padding:15px;
    }

    .dashboard-hero{
        padding:22px;
    }

    .hero-title{
        font-size:25px;
    }

    .quick-menu{
        grid-template-columns:1fr;
    }

    .stat-number{
        font-size:28px;
    }

    .chart-body,
    .panel-body{
        padding:16px;
    }
}
</style>

<?php
$total_kategori = isset($total_kategori) ? $total_kategori : 0;
$total_buku     = isset($total_buku) ? $total_buku : 0;
?>

<div class="container-fluid dashboard-wrapper">

    <!-- HERO -->
    <div class="dashboard-hero">

        <div class="row align-items-center">

            <div class="col-lg-8 mb-4 mb-lg-0">

                <div class="hero-content">

                    <div class="hero-badge">
                        <i class="fas fa-book-reader"></i>
                        Library Dashboard
                    </div>

                    <div class="hero-title">
                        Selamat Datang Kembali!
                    </div>

                    <div class="hero-subtitle">
                        Pantau data kategori, koleksi buku, aktivitas sistem, dan perkembangan perpustakaan melalui tampilan dashboard yang lebih lengkap dan informatif.
                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="row">

                    <div class="col-6">

                        <div class="hero-mini-card">

                            <div class="hero-mini-label">
                                Kategori
                            </div>

                            <div class="hero-mini-number">
                                <?= $total_kategori; ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-6">

                        <div class="hero-mini-card">

                            <div class="hero-mini-label">
                                Buku
                            </div>

                            <div class="hero-mini-number">
                                <?= $total_buku; ?>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- STAT -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="stat-card purple">

                <div class="stat-top">
                    <div class="stat-icon" style="background:#eef2ff;">
                        <i class="fas fa-layer-group" style="color:#6366f1;font-size:22px;"></i>
                    </div>
                </div>

                <div class="stat-label">Total Kategori</div>
                <div class="stat-number"><?= $total_kategori; ?></div>
                <div class="stat-desc">Jumlah kategori yang tersedia.</div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="stat-card green">

                <div class="stat-top">
                    <div class="stat-icon" style="background:#ecfdf5;">
                        <i class="fas fa-book-open" style="color:#10b981;font-size:22px;"></i>
                    </div>
                </div>

                <div class="stat-label">Total Buku</div>
                <div class="stat-number"><?= $total_buku; ?></div>
                <div class="stat-desc">Semua koleksi buku tercatat.</div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="stat-card orange">

                <div class="stat-top">
                    <div class="stat-icon" style="background:#fff7ed;">
                        <i class="fas fa-chart-line" style="color:#f59e0b;font-size:22px;"></i>
                    </div>
                </div>

                <div class="stat-label">Status Sistem</div>
                <div class="stat-number">Aktif</div>
                <div class="stat-desc">Dashboard berjalan normal.</div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="stat-card blue">

                <div class="stat-top">
                    <div class="stat-icon" style="background:#e0f2fe;">
                        <i class="fas fa-database" style="color:#0ea5e9;font-size:22px;"></i>
                    </div>
                </div>

                <div class="stat-label">Data Master</div>
                <div class="stat-number"><?= $total_kategori + $total_buku; ?></div>
                <div class="stat-desc">Gabungan kategori dan buku.</div>

            </div>

        </div>

    </div>

</div>

<!-- CONTENT ROW -->
<div class="row">

    <!-- CHART -->
    <div class="col-xl-8 mb-4">

        <div class="chart-card">

            <div class="chart-header">

                <div>
                    <div class="chart-title">
                        Statistik Visual
                    </div>

                    <div class="panel-subtitle">
                        Perbandingan jumlah kategori dan buku
                    </div>
                </div>

                <i class="fas fa-chart-bar text-primary"></i>

            </div>

            <div class="chart-body">
                <canvas id="chartDashboard"></canvas>
            </div>

        </div>

    </div>

    <!-- QUICK MENU -->
    <div class="col-xl-4 mb-4">

        <div class="panel-card">

            <div class="panel-header">

                <div>
                    <div class="panel-title">
                        Menu Cepat
                    </div>

                    <div class="panel-subtitle">
                        Shortcut fitur utama
                    </div>
                </div>

                <i class="fas fa-bolt text-warning"></i>

            </div>

            <div class="panel-body">

                <div class="quick-menu">

                    <a href="<?= site_url('buku/tambah'); ?>" class="quick-item">

                        <div class="quick-icon" style="background:#eef2ff;">
                            <i class="fas fa-plus text-primary"></i>
                        </div>

                        <div class="quick-title">
                            Tambah Buku
                        </div>

                        <div class="quick-desc">
                            Tambah koleksi baru
                        </div>

                    </a>

                    <a href="<?= site_url('kategori'); ?>" class="quick-item">

                        <div class="quick-icon" style="background:#ecfdf5;">
                            <i class="fas fa-folder-open text-success"></i>
                        </div>

                        <div class="quick-title">
                            Kategori
                        </div>

                        <div class="quick-desc">
                            Kelola kategori buku
                        </div>

                    </a>

                    <a href="<?= site_url('anggota'); ?>" class="quick-item">

                        <div class="quick-icon" style="background:#fff7ed;">
                            <i class="fas fa-users text-warning"></i>
                        </div>

                        <div class="quick-title">
                            Anggota
                        </div>

                        <div class="quick-desc">
                            Data anggota perpustakaan
                        </div>

                    </a>

                    <a href="<?= site_url('laporan/buku'); ?>" class="quick-item">

                        <div class="quick-icon" style="background:#fdf2f8;">
                            <i class="fas fa-file-alt" style="color:#ec4899;"></i>
                        </div>

                        <div class="quick-title">
                            Laporan
                        </div>

                        <div class="quick-desc">
                            Cetak laporan data
                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- LOWER CONTENT -->
<div class="row">

    <!-- PROGRESS -->
    <div class="col-xl-5 mb-4">

        <div class="panel-card">

            <div class="panel-header">

                <div>
                    <div class="panel-title">
                        Ringkasan Data
                    </div>

                    <div class="panel-subtitle">
                        Statistik pengelolaan
                    </div>
                </div>

                <i class="fas fa-tasks text-success"></i>

            </div>

            <div class="panel-body">

                <div class="progress-list">

                    <div>

                        <div class="progress-info">
                            <span class="progress-name">
                                Kelengkapan Buku
                            </span>

                            <span class="progress-percent">
                                85%
                            </span>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-success" style="width:85%;"></div>
                        </div>

                    </div>

                    <div>

                        <div class="progress-info">
                            <span class="progress-name">
                                Pengelolaan Kategori
                            </span>

                            <span class="progress-percent">
                                72%
                            </span>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width:72%;"></div>
                        </div>

                    </div>

                    <div>

                        <div class="progress-info">
                            <span class="progress-name">
                                Aktivitas Sistem
                            </span>

                            <span class="progress-percent">
                                90%
                            </span>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width:90%;"></div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ACTIVITY -->
    <div class="col-xl-7 mb-4">

        <div class="panel-card">

            <div class="panel-header">

                <div>
                    <div class="panel-title">
                        Aktivitas Terbaru
                    </div>

                    <div class="panel-subtitle">
                        Aktivitas dashboard
                    </div>
                </div>

                <i class="fas fa-clock text-primary"></i>

            </div>

            <div class="panel-body">

                <div class="activity-item">

                    <div class="activity-dot bg-success"></div>

                    <div>
                        <div class="activity-title">
                            Dashboard berhasil dimuat
                        </div>

                        <div class="activity-time">
                            Baru saja
                        </div>
                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-dot bg-primary"></div>

                    <div>
                        <div class="activity-title">
                            Data kategori berhasil ditampilkan
                        </div>

                        <div class="activity-time">
                            <?= $total_kategori; ?> kategori tersedia
                        </div>
                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-dot bg-warning"></div>

                    <div>
                        <div class="activity-title">
                            Data buku berhasil dihitung
                        </div>

                        <div class="activity-time">
                            <?= $total_buku; ?> buku tercatat
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>