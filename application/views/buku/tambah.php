<!-- application/views/buku/tambah_buku.php -->

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tambah Buku
    </h1>

    <div class="card shadow mb-4">

        <div class="card-body">

            <form action="<?= site_url('buku/simpan'); ?>" method="post">

                <!-- KODE BUKU -->
                <div class="form-group">
                    <label>Kode Buku</label>

                    <input 
                        type="text"
                        name="kode_buku"
                        class="form-control"
                        placeholder="Masukkan kode buku"
                        required>
                </div>

                <!-- JUDUL -->
                <div class="form-group">
                    <label>Judul Buku</label>

                    <input 
                        type="text"
                        name="judul"
                        class="form-control"
                        placeholder="Masukkan judul buku"
                        required>
                </div>

                <!-- PENULIS -->
                <div class="form-group">
                    <label>Penulis</label>

                    <input 
                        type="text"
                        name="penulis"
                        class="form-control"
                        placeholder="Masukkan nama penulis"
                        required>
                </div>

                <!-- PENERBIT -->
                <div class="form-group">
                    <label>Penerbit</label>

                    <input 
                        type="text"
                        name="penerbit"
                        class="form-control"
                        placeholder="Masukkan penerbit"
                        required>
                </div>

                <!-- TAHUN -->
                <div class="form-group">
                    <label>Tahun</label>

                    <input 
                        type="date"
                        name="tahun"
                        class="form-control"
                        required>
                </div>

                <!-- KATEGORI -->
                <div class="form-group">
                    <label>Kategori</label>

                    <select 
                        name="kategori"
                        class="form-control"
                        required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <?php foreach($kategori as $k): ?>

                            <option value="<?= $k->nama_kategori; ?>">
                                <?= $k->nama_kategori; ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- STOK -->
                <div class="form-group">
                    <label>Stok</label>

                    <input 
                        type="number"
                        name="stok"
                        class="form-control"
                        placeholder="Masukkan stok buku"
                        required>
                </div>

                <!-- LOKASI RAK -->
                <div class="form-group">
                    <label>Lokasi Rak</label>

                    <input 
                        type="text"
                        name="lokasi_rak"
                        class="form-control"
                        placeholder="Contoh: Rak A1"
                        required>
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="<?= site_url('buku'); ?>" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>