<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Tambah Buku</h2>

    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('buku/simpan'); ?>">

                <div class="form-group mb-3">
                    <label>Kode Buku</label>
                    <input type="text" name="kode_buku" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Tahun</label>
                    <input type="date" name="tahun" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $k) { ?>
                            <option value="<?= $k->id ?>">
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= site_url('buku'); ?>" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>