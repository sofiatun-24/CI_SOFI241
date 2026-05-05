<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Data Peminjaman</h2>

<a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i>Tambah</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
<table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
<thead class="thead-dark">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
</tbody>
    <?php $no=1; foreach($data as $d): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->kode_peminjaman; ?></td>
            <td><?= $d->nama; ?></td>
            <td><?= $d->tanggal_pinjam; ?></td>
            <td><?= $d->status; ?></td>
            <td>
                <?php if($d->status =='dipinjam'): ?>
                <a href="<?= site_url('peminjaman/kembali/'.$d->id); ?>"
                class="btn btn-success btn-sm">
                Kembalikan
                </a>
                <?php endif; ?>
            </td>
</tr>
<?php endforeach; ?>
    </tbody>
</table>
    </div>
    </div>
    </div>
    </div>