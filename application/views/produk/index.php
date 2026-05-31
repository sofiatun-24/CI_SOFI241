<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
    :root {
        --green:      #3dbb85;
        --green-dark: #2a9e6e;
        --green-light:#e8f8f2;
        --pink:       #e97fa8;
        --pink-dark:  #d4608e;
        --pink-light: #fce8f1;
    }
    body { background-color: #f7faf9 !important; }

    /* page header */
    .page-hero {
        background: linear-gradient(135deg, var(--green), var(--green-dark));
        border-radius: 16px;
        padding: 22px 28px;
        color: #fff;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content:""; position:absolute;
        width:160px; height:160px;
        background:rgba(255,255,255,.08);
        border-radius:50%; right:-40px; top:-60px;
    }
    .page-hero-content { position:relative; z-index:2; }

    /* cards */
    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,.06);
    }

    /* stat */
    .stat-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        transition: .2s;
    }
    .stat-card:hover { transform: translateY(-3px); }

    /* table */
    .table thead tr {
        background: linear-gradient(135deg, var(--green), var(--green-dark));
        color: #fff;
    }
    .table thead th {
        border: none !important;
        padding: 13px 16px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .05em;
        font-weight: 600;
    }
    .table tbody td {
        padding: 13px 16px;
        vertical-align: middle;
        border-color: #f0f0f0;
    }
    .table tbody tr:hover { background: #f4fdf9; }

    /* badges */
    .badge-stok-ok {
        background: var(--green-light);
        color: var(--green-dark);
        border-radius: 99px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-stok-low {
        background: var(--pink-light);
        color: var(--pink-dark);
        border-radius: 99px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .kode-chip {
        background: #f0f9f5;
        border: 1px solid #c2edd9;
        border-radius: 8px;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: 600;
        color: var(--green-dark);
    }
    .avatar-produk {
        width: 38px; height: 38px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 14px;
        color: #fff; flex-shrink: 0;
    }

    /* buttons */
    .btn-green {
        background: var(--green); color: #fff; border: none; border-radius: 8px;
    }
    .btn-green:hover { background: var(--green-dark); color: #fff; }
    .btn-edit {
        background: #fff3f8; color: var(--pink-dark);
        border: 1px solid var(--pink-light); border-radius: 8px;
        font-size: 12px; padding: 5px 12px;
    }
    .btn-edit:hover { background: var(--pink-light); color: var(--pink-dark); }
    .btn-hapus {
        background: #fff0f0; color: #e05252;
        border: 1px solid #fdd; border-radius: 8px;
        font-size: 12px; padding: 5px 12px;
    }
    .btn-hapus:hover { background: #ffe0e0; color: #c0392b; }

    .alert { border: none; border-radius: 12px; }
</style>

<!-- ALERT -->
<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show shadow-sm">
    <i class="fas fa-check-circle mr-2"></i>
    <?= $this->session->flashdata('success') ?>
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
<?php endif; ?>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-content d-flex justify-content-between align-items-center">
        <div>
            <h5 class="font-weight-bold mb-1">
                <i class="fas fa-box mr-2"></i> Data Produk
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                Kelola seluruh data produk elektronik PT Maju Jaya
            </p>
        </div>
        <a href="<?= site_url('produk/tambah') ?>" class="btn btn-sm text-dark font-weight-bold"
           style="background:#fff; border-radius:10px; padding:8px 18px;">
            <i class="fas fa-plus mr-1" style="color:var(--green);"></i> Tambah Produk
        </a>
    </div>
</div>

<!-- STAT CARDS -->
<div class="row mb-4">
    <?php
        $total  = count($produk);
        $ok     = count(array_filter((array)$produk, function($p){ return $p->stok >= 5; }));
        $tipis  = $total - $ok;
    ?>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid var(--green);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:var(--green-light);
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-box" style="color:var(--green);font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--green);text-transform:uppercase;letter-spacing:.05em;">
                            Total Produk
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= $total ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid #6ecfaa;">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:#e0f7ef;
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-check-circle" style="color:#6ecfaa;font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#4dac87;text-transform:uppercase;letter-spacing:.05em;">
                            Stok Cukup
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= $ok ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid var(--pink);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:var(--pink-light);
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-exclamation-triangle" style="color:var(--pink);font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--pink-dark);text-transform:uppercase;letter-spacing:.05em;">
                            Stok Menipis
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= $tipis ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="card card-modern">
    <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold" style="color:#2d3748;">
            <i class="fas fa-list mr-2" style="color:var(--green);"></i> Daftar Produk
        </h6>
        <span class="badge" style="background:var(--green-light);color:var(--green-dark);border-radius:99px;padding:5px 12px;font-size:12px;">
            <?= $total ?> produk
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $avatar_colors = ['#3dbb85','#6ecfaa','#e97fa8','#f0a3c4','#2a9e6e','#d4608e'];
                $no = 1;
                foreach ($produk as $i => $p):
                    $warna = $avatar_colors[$i % count($avatar_colors)];
                ?>
                <tr>
                    <td class="text-muted small"><?= $no++ ?></td>
                    <td>
                        <span class="kode-chip">
                            <i class="fas fa-barcode mr-1"></i><?= $p->kode_produk ?>
                        </span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-produk mr-2" style="background:<?= $warna ?>;">
                                <?= strtoupper(substr($p->nama_produk, 0, 1)) ?>
                            </div>
                            <span style="font-weight:500; color:#2d3748;"><?= $p->nama_produk ?></span>
                        </div>
                    </td>
                    <td>
                        <span class="font-weight-bold" style="color:#2d3748;">
                            Rp <?= number_format($p->harga, 0, ',', '.') ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if ($p->stok < 5): ?>
                        <span class="badge-stok-low">
                            <i class="fas fa-circle mr-1" style="font-size:7px;"></i><?= $p->stok ?>
                        </span>
                        <?php else: ?>
                        <span class="badge-stok-ok">
                            <i class="fas fa-circle mr-1" style="font-size:7px;"></i><?= $p->stok ?>
                        </span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= site_url('produk/edit/'.$p->id) ?>" class="btn btn-edit btn-sm mr-1">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <a href="<?= site_url('produk/hapus/'.$p->id) ?>"
                           class="btn btn-hapus btn-sm"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<?php $this->load->view('templates/footer'); ?>