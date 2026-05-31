<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-people me-2"></i>Data Pelanggan</h4>
    <a href="<?= base_url('pelanggan/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Pelanggan
    </a>
</div>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr><th>No</th><th>Nama</th><th>Alamat</th><th>No. Telepon</th><th>Aksi</th></tr>
            </thead>
            <tbody>
            <?php foreach ($pelanggan as $i => $p): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $p->nama ?></td>
                <td><?= $p->alamat ?></td>
                <td><?= $p->no_telepon ?></td>
                <td>
                    <a href="<?= base_url('pelanggan/edit/'.$p->id) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                    <a href="<?= base_url('pelanggan/hapus/'.$p->id) ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Hapus pelanggan ini?')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>