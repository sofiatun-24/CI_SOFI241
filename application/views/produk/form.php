<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
    :root {
        --green:      #3dbb85;
        --green-dark: #2a9e6e;
        --green-light:#e8f8f2;
        --pink:       #e97fa8;
        --pink-dark:  #d4608e;
        --pink-light: #fce8f1;
    }
    body { background-color: #f7faf9 !important; }

    .page-hero {
        background: linear-gradient(135deg, var(--green), var(--green-dark));
        border-radius: 16px;
        padding: 22px 28px;
        color: #fff;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content:""; position:absolute;
        width:160px; height:160px;
        background:rgba(255,255,255,.08);
        border-radius:50%; right:-40px; top:-60px;
    }
    .page-hero-content { position:relative; z-index:2; }

    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,.06);
    }
    .form-control {
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        padding: 10px 14px;
        font-size: 14px;
        transition: .2s;
    }
    .form-control:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(61,187,133,.15);
    }
    .input-group-text {
        border-radius: 10px 0 0 10px;
        border: 1.5px solid #e2e8f0;
        background: var(--green-light);
        color: var(--green-dark);
        font-weight: 600;
    }
    .input-group .form-control {
        border-radius: 0 10px 10px 0;
    }
    label {
        font-weight: 600;
        font-size: 13px;
        color: #4a5568;
        margin-bottom: 6px;
    }
    .btn-green {
        background: var(--green); color: #fff;
        border: none; border-radius: 10px;
        padding: 10px 24px; font-weight: 600;
    }
    .btn-green:hover { background: var(--green-dark); color: #fff; }
    .btn-outline-cancel {
        background: #fff; color: #718096;
        border: 1.5px solid #e2e8f0; border-radius: 10px;
        padding: 10px 24px; font-weight: 600;
    }
    .btn-outline-cancel:hover { background: #f7fafc; color: #4a5568; }
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-content d-flex align-items-center">
        <a href="<?= site_url('produk') ?>"
           style="background:rgba(255,255,255,.2); border-radius:10px; padding:7px 14px;
                  color:#fff; font-size:13px; font-weight:600; margin-right:16px; text-decoration:none;">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
        <div>
            <h5 class="font-weight-bold mb-0">
                <i class="fas fa-<?= $produk ? 'edit' : 'plus-circle' ?> mr-2"></i>
                <?= $produk ? 'Edit Produk' : 'Tambah Produk Baru' ?>
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                <?= $produk ? 'Perbarui informasi data produk' : 'Isi form untuk menambah produk baru' ?>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-modern">

            <!-- Card Header -->
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                <div class="d-flex align-items-center">
                    <div style="width:40px;height:40px;border-radius:12px;background:var(--green-light);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-box" style="color:var(--green);"></i>
                    </div>
                    <div>
                        <h6 class="font-weight-bold mb-0">Informasi Produk</h6>
                        <small class="text-muted">Semua field wajib diisi</small>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="<?= $produk ? site_url('produk/update/'.$produk->id) : site_url('produk/simpan') ?>"
                      method="POST">

                    <div class="form-group">
                        <label><i class="fas fa-barcode mr-1" style="color:var(--green);"></i> Kode Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">#</span>
                            </div>
                            <input type="text" name="kode_produk" class="form-control"
                                   placeholder="Contoh: PRD-001"
                                   value="<?= $produk->kode_produk ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-tag mr-1" style="color:var(--green);"></i> Nama Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                            </div>
                            <input type="text" name="nama_produk" class="form-control"
                                   placeholder="Nama produk"
                                   value="<?= $produk->nama_produk ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-money-bill mr-1" style="color:var(--green);"></i> Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control"
                                   placeholder="0" min="0"
                                   value="<?= $produk->harga ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-cubes mr-1" style="color:var(--green);"></i> Stok</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                            </div>
                            <input type="number" name="stok" class="form-control"
                                   placeholder="0" min="0"
                                   value="<?= $produk->stok ?? '' ?>" required>
                        </div>
                        <small class="text-muted">Stok di bawah 5 akan ditandai menipis</small>
                    </div>

                    <hr style="border-color:#f0f0f0;">

                    <div class="d-flex">
                        <button type="submit" class="btn btn-green mr-2">
                            <i class="fas fa-save mr-1"></i>
                            <?= $produk ? 'Update Produk' : 'Simpan Produk' ?>
                        </button>
                        <a href="<?= site_url('produk') ?>" class="btn btn-outline-cancel">
                            Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Tips Card -->
    <div class="col-lg-6">
        <div class="card card-modern">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <div style="width:40px;height:40px;border-radius:12px;background:var(--pink-light);
                                display:flex;align-items:center;justify-content:center;margin-right:12px;">
                        <i class="fas fa-lightbulb" style="color:var(--pink);"></i>
                    </div>
                    <h6 class="font-weight-bold mb-0">Tips Pengisian</h6>
                </div>
                <ul class="list-unstyled mb-0" style="font-size:13px; color:#4a5568;">
                    <li class="mb-2">
                        <i class="fas fa-check-circle mr-2" style="color:var(--green);"></i>
                        Kode produk harus unik, contoh: <strong>PRD-001</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle mr-2" style="color:var(--green);"></i>
                        Harga diisi tanpa titik atau koma
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle mr-2" style="color:var(--green);"></i>
                        Stok kurang dari 5 akan ditandai <span style="color:var(--pink-dark);font-weight:600;">menipis</span>
                    </li>
                    <li>
                        <i class="fas fa-check-circle mr-2" style="color:var(--green);"></i>
                        Stok akan otomatis berkurang saat order dibuat
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
<?php $this->load->view('templates/footer'); ?>