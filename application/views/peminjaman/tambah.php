<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h2>

<div class="card shadow">
    <div class="card-body">
<form method="post" action="<?= site_url('peminjaman/simpan'); ?>">
    <div class="form-group">
    <label>Anggota</label><br>
    <select name="anggota_id" class="form-control">
        <?php foreach($anggota as $a): ?>
            <option value="<?= $a->id; ?>"= $a->nama; ?></option>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <label>Buku</label>
            <select name="buku_id" class="form-control">
                <?php foreach($buku as $b): ?>
                    <option value="<?= $b->id; ?>"><?= $b->juful; ?></option>
                    <?php endforeach; ?>
                </div>
        <div class="form-group">
            <label> Tanggal Jatuh Tempo</label>
            <input type="date" name="tanggal_jatuh_tempo" class="form-control" required>
        </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('kategori');?>" class="btn btn-secondary">Kembali</a>


</form>
</div>
</div>
</div>