<?php $this->load->view('templates/header'); ?>

<style>
:root{
    --green:#3dbb85;
    --green-dark:#2a9e6e;
    --green-light:#e8f8f2;

    --pink:#e97fa8;
    --pink-dark:#d4608e;
    --pink-light:#fce8f1;
}

.page-header{
    background:linear-gradient(135deg,var(--green),var(--green-dark),var(--pink));
    color:white;
    border-radius:18px;
    padding:24px 30px;
    margin-bottom:25px;
    position:relative;
    overflow:hidden;
}

.page-header::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    top:-80px;
    right:-40px;
}

.page-header::after{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(255,255,255,.06);
    bottom:-50px;
    right:80px;
}

.form-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.form-card .card-header{
    background:#fff;
    border-bottom:1px solid #eee;
    padding:18px 25px;
}

.form-card .card-body{
    padding:25px;
}

.form-label{
    font-weight:600;
    color:#555;
}

.form-control{
    border-radius:10px;
    border:1px solid #ddd;
    padding:10px 14px;
}

.form-control:focus{
    border-color:var(--green);
    box-shadow:0 0 0 .2rem rgba(61,187,133,.15);
}

.btn-green{
    background:var(--green);
    border:none;
    color:white;
    border-radius:10px;
    padding:10px 18px;
}

.btn-green:hover{
    background:var(--green-dark);
    color:white;
}

.btn-pink{
    background:var(--pink);
    border:none;
    color:white;
    border-radius:10px;
    padding:10px 18px;
}

.btn-pink:hover{
    background:var(--pink-dark);
    color:white;
}

.required{
    color:#dc3545;
}
</style>

<div class="container-fluid">

    <!-- HERO -->
    <div class="page-header">
        <h3 class="mb-1 font-weight-bold">
            <?= $pelanggan ? 'Edit Pelanggan' : 'Tambah Pelanggan' ?>
        </h3>

        <p class="mb-0" style="opacity:.9;">
            Kelola data pelanggan konveksi dengan mudah dan cepat.
        </p>
    </div>

    <!-- FORM -->
    <div class="card form-card">

        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-user-circle mr-2"></i>
                Form Data Pelanggan
            </h5>
        </div>

        <div class="card-body">

            <form action="<?= $pelanggan ? base_url('pelanggan/update/'.$pelanggan->id) : base_url('pelanggan/simpan') ?>" method="POST">

                <div class="form-group mb-3">
                    <label class="form-label">
                        Nama Pelanggan <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= $pelanggan->nama ?? '' ?>"
                        placeholder="Masukkan nama pelanggan"
                        required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan alamat pelanggan"><?= $pelanggan->alamat ?? '' ?></textarea>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">
                        No. Telepon
                    </label>

                    <input
                        type="text"
                        name="no_telepon"
                        class="form-control"
                        value="<?= $pelanggan->no_telepon ?? '' ?>"
                        placeholder="08xxxxxxxxxx">
                </div>

                <button type="submit" class="btn btn-green">
                    <i class="fas fa-save mr-1"></i>
                    Simpan
                </button>

                <a href="<?= base_url('pelanggan') ?>" class="btn btn-pink ml-2">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>