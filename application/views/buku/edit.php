<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Edit Buku</h2>

    <div class="card shadow">
        <div class="card-body">

            <form method="post" action="<?= site_url('buku/update/'.$buku->kode_buku); ?>">

                <!-- Judul -->
                <div class="form-group mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" 
                           value="<?= $buku->judul; ?>" required>
                </div>

                <!-- Penulis -->
                <div class="form-group mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" 
                           value="<?= $buku->penulis; ?>" required>
                </div>

                <!-- Penerbit -->
                <div class="form-group mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" 
                           value="<?= $buku->penerbit; ?>" required>
                </div>

                <!-- Tahun -->
                <div class="form-group mb-3">
                    <label>Tahun</label>
                    <input type="date" name="tahun" class="form-control" 
                           value="<?= $buku->tahun; ?>" required>
                </div>

                <!-- Kategori -->
                <div class="form-group mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id; ?>" 
                                <?= ($k->id == $buku->kategori) ? 'selected' : ''; ?>>
                                <?= $k->nama_kategori; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Stok -->
                <div class="form-group mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" 
                           value="<?= $buku->stok; ?>" required>
                </div>

                <!-- Lokasi Rak -->
                <div class="form-group mb-3">
                    <label>Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" class="form-control" 
                           value="<?= $buku->lokasi_rak; ?>" required>
                </div>

                <!-- Button -->
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= site_url('buku'); ?>" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>