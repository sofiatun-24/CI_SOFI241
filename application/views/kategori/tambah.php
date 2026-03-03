<h2> Tambah Kategori</h2>
<a href="<?= site_url('kategori'); ?> ">Kembali</a>
<br><br>

<form method="post" action="<?= site_url('kategori/simpan'); ?>">

<label>Nama Kategori</label><br>
<input type="text" name="nama_kategori" required>
<br><br>

<button type="submit">Simpan</button>
<button type="Reset">Reset</button>

</form>