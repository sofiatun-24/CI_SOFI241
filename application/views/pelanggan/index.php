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

    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,.06);
    }
    .stat-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 4px 12px rgba(0,0,0,.06);
        transition: .2s;
    }
    .stat-card:hover { transform: translateY(-3px); }

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

    .avatar-pelanggan {
        width: 38px; height: 38px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 14px;
        color: #fff; flex-shrink: 0;
    }
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
    .btn-green {
        background: var(--green); color: #fff;
        border: none; border-radius: 8px;
    }
    .btn-green:hover { background: var(--green-dark); color: #fff; }

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
                <i class="fas fa-users mr-2"></i> Data Pelanggan
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                Kelola seluruh data pelanggan PT Maju Jaya
            </p>
        </div>
        <a href="<?= site_url('pelanggan/tambah') ?>"
           class="btn btn-sm text-dark font-weight-bold"
           style="background:#fff; border-radius:10px; padding:8px 18px;">
            <i class="fas fa-plus mr-1" style="color:var(--green);"></i> Tambah Pelanggan
        </a>
    </div>
</div>

<!-- STAT CARD -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card stat-card" style="border-left: 4px solid var(--green);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <div style="width:44px;height:44px;border-radius:12px;background:var(--green-light);
                                    display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-users" style="color:var(--green);font-size:18px;"></i>
                        </div>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--green-dark);
                                    text-transform:uppercase;letter-spacing:.05em;">
                            Total Pelanggan
                        </div>
                        <div class="h4 mb-0 font-weight-bold"><?= count($pelanggan) ?></div>
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
            <i class="fas fa-list mr-2" style="color:var(--green);"></i> Daftar Pelanggan
        </h6>
        <span style="background:var(--green-light);color:var(--green-dark);border-radius:99px;
                     padding:5px 12px;font-size:12px;font-weight:600;">
            <?= count($pelanggan) ?> pelanggan
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $avatar_colors = ['#3dbb85','#e97fa8','#6ecfaa','#f0a3c4','#2a9e6e','#d4608e'];
                $no = 1;
                foreach ($pelanggan as $i => $p):
                    $warna = $avatar_colors[$i % count($avatar_colors)];
                ?>
                <tr>
                    <td class="text-muted small"><?= $no++ ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-pelanggan mr-2" style="background:<?= $warna ?>;">
                                <?= strtoupper(substr($p->nama, 0, 1)) ?>
                            </div>
                            <span style="font-weight:500; color:#2d3748;"><?= $p->nama ?></span>
                        </div>
                    </td>
                    <td class="text-muted" style="font-size:13px;">
                        <i class="fas fa-map-marker-alt mr-1" style="color:var(--green);"></i>
                        <?= $p->alamat ?>
                    </td>
                    <td class="text-muted" style="font-size:13px;">
                        <i class="fas fa-phone-alt mr-1" style="color:var(--green);"></i>
                        <?= $p->no_telepon ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= site_url('pelanggan/edit/'.$p->id) ?>" class="btn btn-edit btn-sm mr-1">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <a href="<?= site_url('pelanggan/hapus/'.$p->id) ?>"
                           class="btn btn-hapus btn-sm"
                           onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">
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