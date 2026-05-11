<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Buku</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('buku') ?>">
            <div class="sidebar-brand-icon"><i class="fas fa-book"></i></div>
            <div class="sidebar-brand-text mx-3">Perpustakaan</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('buku') ?>"><i class="fas fa-fw fa-table mr-2"></i><span>Data Buku</span></a></li>
        <li class="nav-item active"><a class="nav-link" href="#"><i class="fas fa-fw fa-plus mr-2"></i><span>Tambah Buku</span></a></li>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><span class="nav-link text-gray-600"><i class="fas fa-user mr-1"></i> Admin</span></li>
                </ul>
            </nav>

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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Buku <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="kode_buku"
                                           class="form-control"
                                           placeholder="Contoh: 001"
                                           value="<?= set_value('kode_buku') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul Buku <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="judul"
                                           class="form-control"
                                           placeholder="Masukkan judul buku"
                                           value="<?= set_value('judul') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penulis <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="penulis"
                                           class="form-control"
                                           placeholder="Nama penulis"
                                           value="<?= set_value('penulis') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penerbit <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="penerbit"
                                           class="form-control"
                                           placeholder="Nama penerbit"
                                           value="<?= set_value('penerbit') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tahun Terbit <span class="text-danger">*</span></label>
                                    <input type="number"
                                           name="tahun"
                                           class="form-control"
                                           placeholder=""
                                           min="1900"
                                           max="<?= date('Y') ?>"
                                           value="<?= set_value('tahun') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kategori <span class="text-danger">*</span></label>
                                    <select name="id" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php foreach ($kategori as $k): ?>
                                            <option value="<?= $k->id ?>"
                                                <?= set_select('id', $k->id) ?>>
                                                <?= htmlspecialchars($k->nama_kategori) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Stok <span class="text-danger">*</span></label>
                                    <input type="number"
                                           name="stok"
                                           class="form-control"
                                           placeholder="Jumlah stok"
                                           min="0"
                                           value="<?= set_value('stok') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lokasi Rak <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="lokasi_rak"
                                           class="form-control"
                                           placeholder="Contoh: Rak Blok-3"
                                           value="<?= set_value('lokasi_rak') ?>"
                                           required>
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