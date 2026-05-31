<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-box-seam me-2"></i>Data Produk</h4>
    <a href="<?= base_url('produk/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
    </a>
</div>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($produk as $i => $p): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $p->kode_produk ?></td>
                <td><?= $p->nama_produk ?></td>
                <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                <td>
                    <span class="badge <?= $p->stok < 5 ? 'bg-danger' : 'bg-success' ?>">
                        <?= $p->stok ?>
                    </span>
                </td>
                <td>
                    <a href="<?= base_url('produk/edit/'.$p->id) ?>" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="<?= base_url('produk/hapus/'.$p->id) ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Hapus produk ini?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>