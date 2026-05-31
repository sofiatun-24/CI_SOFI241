<?php $this->load->view('templates/header'); ?>

<h4 class="mb-4"><?= $produk ? 'Edit Produk' : 'Tambah Produk' ?></h4>

<div class="card shadow-sm" style="max-width: 500px;">
    <div class="card-body">
        <form action="<?= $produk ? base_url('produk/update/'.$produk->id) : base_url('produk/simpan') ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Kode Produk</label>
                <input type="text" name="kode_produk" class="form-control"
                       value="<?= $produk->kode_produk ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control"
                       value="<?= $produk->nama_produk ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control"
                       value="<?= $produk->harga ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control"
                       value="<?= $produk->stok ?? '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>