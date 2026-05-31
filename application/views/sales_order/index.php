<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-cart3 me-2"></i>Sales Order</h4>
    <?php if ($this->session->userdata('role') != 'admin'): ?>
    <a href="<?= base_url('salesorder/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Buat Order Baru
    </a>
    <?php endif; ?>
</div>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No. Order</th><th>Tanggal</th><th>Sales</th>
                    <th>Pelanggan</th><th>Total</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $o): ?>
            <tr>
                <td><strong><?= $o->no_order ?></strong></td>
                <td><?= date('d/m/Y', strtotime($o->tanggal)) ?></td>
                <td><?= $o->nama_sales ?></td>
                <td><?= $o->nama_pelanggan ?></td>
                <td>Rp <?= number_format($o->total_harga, 0, ',', '.') ?></td>
                <td>
                    <?php
                    $badge = ['draft'=>'secondary','dikirim'=>'primary','selesai'=>'success','dibatalkan'=>'danger'];
                    ?>
                    <span class="badge bg-<?= $badge[$o->status] ?>"><?= ucfirst($o->status) ?></span>
                </td>
                <td>
                    <a href="<?= base_url('salesorder/detail/'.$o->id) ?>" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-eye"></i> Detail
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>