<?php $this->load->view('templates/header'); ?>

<h4 class="mb-4"><?= $pelanggan ? 'Edit Pelanggan' : 'Tambah Pelanggan' ?></h4>

<div class="card shadow-sm" style="max-width: 500px;">
    <div class="card-body">
        <form action="<?= $pelanggan ? base_url('pelanggan/update/'.$pelanggan->id) : base_url('pelanggan/simpan') ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $pelanggan->nama ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"><?= $pelanggan->alamat ?? '' ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="<?= $pelanggan->no_telepon ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
            <a href="<?= base_url('pelanggan') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>