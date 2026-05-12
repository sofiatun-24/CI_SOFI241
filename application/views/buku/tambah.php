<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css">
</head>
<body>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Buku</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="<?= base_url('buku') ?>">Data Buku</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </nav>
                </div>

                <?php if (validation_errors()): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <?= validation_errors() ?>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-plus-circle mr-2"></i>Form Input Buku
                        </h6>
                    </div>
                    <div class="card-body">

                        <?= form_open('buku/simpan') ?>

                        <div class="row">

                            <!-- Kode Buku -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Buku <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="kode_buku"
                                           class="form-control"
                                           placeholder="Contoh: 001"
                                           value="<?= set_value('kode_buku') ?>">
                                </div>
                            </div>

                            <!-- Judul Buku -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul Buku <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="judul"
                                           class="form-control"
                                           placeholder="Masukkan judul buku"
                                           value="<?= set_value('judul') ?>">
                                </div>
                            </div>

                            <!-- Penulis -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penulis <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="penulis"
                                           class="form-control"
                                           placeholder="Nama penulis"
                                           value="<?= set_value('penulis') ?>">
                                </div>
                            </div>

                            <!-- Penerbit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penerbit <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="penerbit"
                                           class="form-control"
                                           placeholder="Nama penerbit"
                                           value="<?= set_value('penerbit') ?>">
                                </div>
                            </div>

                            <!-- FIX 1: tahun → type="date" karena kolom DB bertipe DATE -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tahun Terbit <span class="text-danger">*</span></label>
                                    <input type="date"
                                           name="tahun"
                                           class="form-control"
                                           value="<?= set_value('tahun') ?>">
                                </div>
                            </div>

                            <!-- FIX 2: name="id" → name="kategori", value pakai nama_kategori -->
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

                            <!-- Stok -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Stok <span class="text-danger">*</span></label>
                                    <input type="number"
                                           name="stok"
                                           class="form-control"
                                           placeholder="Jumlah stok"
                                           min="0"
                                           value="<?= set_value('stok') ?>">
                                </div>
                            </div>

                            <!-- Lokasi Rak -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lokasi Rak <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="lokasi_rak"
                                           class="form-control"
                                           placeholder="Contoh: Rak Blok-3"
                                           value="<?= set_value('lokasi_rak') ?>">
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>

                        <?= form_close() ?>

                    </div>
                </div>

            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto text-center">
                <span>Perpustakaan &copy; <?= date('Y') ?></span>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
</body>
</html>