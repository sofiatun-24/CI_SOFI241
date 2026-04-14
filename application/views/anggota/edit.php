<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Anggota</h6>
        </div>
        <div class="card-body">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('anggota/update/' . $anggota->nomor_anggota) ?>" method="post">
                <div class="form-group">
                    <label>Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" 
                           class="form-control <?= form_error('nomor_anggota') ? 'is-invalid' : '' ?>"
                           value="<?= set_value('nomor_anggota', $anggota->nomor_anggota) ?>"
                           placeholder="Masukkan Nomor Anggota">
                    <div class="invalid-feedback"><?= form_error('nomor_anggota') ?></div>
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" 
                           class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>"
                           value="<?= set_value('nama', $anggota->nama) ?>"
                           placeholder="Masukkan Nama">
                    <div class="invalid-feedback"><?= form_error('nama') ?></div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3"
                              class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>"
                              placeholder="Masukkan Alamat"><?= set_value('alamat', $anggota->alamat) ?></textarea>
                    <div class="invalid-feedback"><?= form_error('alamat') ?></div>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" 
                           class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>"
                           value="<?= set_value('telepon', $anggota->telepon) ?>"
                           placeholder="Masukkan Telepon">
                    <div class="invalid-feedback"><?= form_error('telepon') ?></div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" 
                           class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>"
                           value="<?= set_value('email', $anggota->email) ?>"
                           placeholder="Masukkan Email">
                    <div class="invalid-feedback"><?= form_error('email') ?></div>
                </div>

                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" 
                           class="form-control <?= form_error('tanggal_daftar') ? 'is-invalid' : '' ?>"
                           value="<?= set_value('tanggal_daftar', $anggota->tanggal_daftar) ?>">
                    <div class="invalid-feedback"><?= form_error('tanggal_daftar') ?></div>
                </div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="Aktif" <?= $anggota->status == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
        <option value="Tidak Aktif" <?= $anggota->status == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
    </select>
</div>

                <a href="<?= base_url('anggota') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>