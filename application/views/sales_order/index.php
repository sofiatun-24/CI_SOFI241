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

    /* badge status */
    .badge-draft     { background:#f1f3f5; color:#6c757d; border-radius:99px; padding:5px 12px; font-size:12px; font-weight:600; }
    .badge-dikirim   { background:#e8f8f2; color:var(--green-dark); border-radius:99px; padding:5px 12px; font-size:12px; font-weight:600; }
    .badge-selesai   { background:#d4f7e8; color:#1a7a50; border-radius:99px; padding:5px 12px; font-size:12px; font-weight:600; }
    .badge-dibatalkan{ background:var(--pink-light); color:var(--pink-dark); border-radius:99px; padding:5px 12px; font-size:12px; font-weight:600; }

    .no-order-chip {
        background: var(--green-light);
        color: var(--green-dark);
        border-radius: 8px;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: 700;
    }
    .btn-detail {
        background: var(--green-light); color: var(--green-dark);
        border: 1px solid #c2edd9; border-radius: 8px;
        font-size: 12px; padding: 5px 12px; font-weight: 600;
    }
    .btn-detail:hover { background: var(--green); color: #fff; border-color: var(--green); }
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
                <i class="fas fa-file-invoice mr-2"></i> Sales Order
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                    Kelola seluruh transaksi sales order
                <?php else: ?>
                    Daftar order yang Anda buat
                <?php endif; ?>
            </p>
        </div>
        <?php if ($this->session->userdata('role') != 'admin'): ?>
        <a href="<?= site_url('salesorder/tambah') ?>"
           class="btn btn-sm text-dark font-weight-bold"
           style="background:#fff; border-radius:10px; padding:8px 18px;">
            <i class="fas fa-plus mr-1" style="color:var(--green);"></i> Buat Order Baru
        </a>
        <?php endif; ?>
    </div>
</div>

<!-- STAT CARDS -->
<?php
    $total      = count($orders);
    $draft      = count(array_filter((array)$orders, function($o){ return $o->status == 'draft'; }));
    $dikirim    = count(array_filter((array)$orders, function($o){ return $o->status == 'dikirim'; }));
    $selesai    = count(array_filter((array)$orders, function($o){ return $o->status == 'selesai'; }));
    $dibatalkan = count(array_filter((array)$orders, function($o){ return $o->status == 'dibatalkan'; }));
?>
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card stat-card" style="border-left:4px solid var(--green);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:var(--green-light);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-file-invoice" style="color:var(--green);font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--green-dark);text-transform:uppercase;">Total Order</div>
                        <div class="h4 mb-0 font-weight-bold"><?= $total ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card stat-card" style="border-left:4px solid #adb5bd;">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:#f1f3f5;
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-pencil-alt" style="color:#6c757d;font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#6c757d;text-transform:uppercase;">Draft</div>
                        <div class="h4 mb-0 font-weight-bold"><?= $draft ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card stat-card" style="border-left:4px solid #6ecfaa;">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:#e0f7ef;
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-check-circle" style="color:#6ecfaa;font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#4dac87;text-transform:uppercase;">Selesai</div>
                        <div class="h4 mb-0 font-weight-bold"><?= $selesai ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card stat-card" style="border-left:4px solid var(--pink);">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div style="width:44px;height:44px;border-radius:12px;background:var(--pink-light);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-times-circle" style="color:var(--pink);font-size:18px;"></i>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:var(--pink-dark);text-transform:uppercase;">Dibatalkan</div>
                        <div class="h4 mb-0 font-weight-bold"><?= $dibatalkan ?></div>
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
            <i class="fas fa-list mr-2" style="color:var(--green);"></i> Daftar Sales Order
        </h6>
        <span style="background:var(--green-light);color:var(--green-dark);border-radius:99px;
                     padding:5px 12px;font-size:12px;font-weight:600;">
            <?= $total ?> order
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th>No. Order</th>
                        <th>Tanggal</th>
                        <th>Sales</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $o): ?>
                <tr>
                    <td>
                        <span class="no-order-chip">
                            <i class="fas fa-hashtag mr-1" style="font-size:10px;"></i>
                            <?= $o->no_order ?>
                        </span>
                    </td>
                    <td class="text-muted" style="font-size:13px;">
                        <i class="fas fa-calendar-alt mr-1" style="color:var(--green);"></i>
                        <?= date('d/m/Y', strtotime($o->tanggal)) ?>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div style="width:30px;height:30px;border-radius:50%;background:var(--green-light);
                                        display:flex;align-items:center;justify-content:center;
                                        font-weight:700;font-size:12px;color:var(--green-dark);margin-right:8px;">
                                <?= strtoupper(substr($o->nama_sales, 0, 1)) ?>
                            </div>
                            <span style="font-size:13px;font-weight:500;"><?= $o->nama_sales ?></span>
                        </div>
                    </td>
                    <td style="font-size:13px;">
                        <i class="fas fa-building mr-1" style="color:var(--pink);"></i>
                        <?= $o->nama_pelanggan ?>
                    </td>
                    <td>
                        <span class="font-weight-bold" style="color:#2d3748;">
                            Rp <?= number_format($o->total_harga, 0, ',', '.') ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if ($o->status == 'draft'): ?>
                            <span class="badge-draft"><i class="fas fa-circle mr-1" style="font-size:7px;"></i>Draft</span>
                        <?php elseif ($o->status == 'dikirim'): ?>
                            <span class="badge-dikirim"><i class="fas fa-circle mr-1" style="font-size:7px;"></i>Dikirim</span>
                        <?php elseif ($o->status == 'selesai'): ?>
                            <span class="badge-selesai"><i class="fas fa-circle mr-1" style="font-size:7px;"></i>Selesai</span>
                        <?php else: ?>
                            <span class="badge-dibatalkan"><i class="fas fa-circle mr-1" style="font-size:7px;"></i>Dibatalkan</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= site_url('salesorder/detail/'.$o->id) ?>" class="btn btn-detail btn-sm">
                            <i class="fas fa-eye mr-1"></i> Detail
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