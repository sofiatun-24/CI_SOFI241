<!-- application/views/buku/index.php -->

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Data Buku</h2>
        <a href="<?= site_url('buku/tambah'); ?>" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Buku
        </a>
    </div>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-1"></i>
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle mr-1"></i>
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Koleksi Buku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($buku)): ?>
                            <?php $no = 1; foreach($buku as $b): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><code><?= $b->kode_buku; ?></code></td>
                                <td><?= $b->judul; ?></td>
                                <td><?= $b->penulis; ?></td>
                                <!-- nama_kategori dari hasil JOIN di model -->
                                <td class="text-center">
                                    <span class="badge badge-info">
                                        <?= $b->nama_kategori ?? '-'; ?>
                                    </span>
                                </td>
                                <td class="text-center font-weight-bold">
                                    <?php if($b->stok > 0): ?>
                                        <span class="text-success"><?= $b->stok; ?></span>
                                    <?php else: ?>
                                        <span class="text-danger"><?= $b->stok; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('buku/edit/' . $b->kode_buku); ?>"
                                       class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= site_url('buku/hapus/' . $b->kode_buku); ?>"
                                       class="btn btn-danger btn-sm btn-hapus"
                                       onclick="return confirm('Yakin ingin menghapus buku \"<?= $b->judul; ?>\"?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-book-open fa-2x mb-2 d-block"></i>
                                    Belum ada data buku.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>