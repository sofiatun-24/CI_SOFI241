<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h2>

    <div class="card shadow">
        <div class="card-body">

            <form method="post" action="<?= site_url('peminjaman/simpan'); ?>">

                <!-- ANGGOTA -->
                <div class="form-group">
                    <label>Anggota</label>

                    <select name="anggota_id" class="form-control" required>
                        <option value="">-- Pilih Anggota --</option>

                        <?php foreach($anggota as $a): ?>
                            <option value="<?= $a->nomor_anggota; ?>">
                                <?= $a->nama; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- BUKU -->
                <div class="form-group">
                    <label>Buku</label>

                    <select name="buku_id" class="form-control" required>
                        <option value="">-- Pilih Buku --</option>

                        <?php foreach($buku as $b): ?>
                            <option value="<?= $b->kode_buku; ?>">
                                <?= $b->judul; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- TANGGAL -->
                <div class="form-group">
                    <label>Tanggal Jatuh Tempo</label>

                    <input 
                        type="date" 
                        name="tanggal_jatuh_tempo" 
                        class="form-control"
                        required>
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>
    </div>
</div>