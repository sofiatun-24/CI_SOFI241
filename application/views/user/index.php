<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

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
    background:linear-gradient(
        135deg,
        var(--green),
        var(--green-dark),
        var(--pink)
    );
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

.table-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.table-card .card-header{
    background:#fff;
    border-bottom:1px solid #eee;
    padding:18px 25px;
}

.table-card .card-body{
    padding:25px;
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
}

.btn-pink:hover{
    background:var(--pink-dark);
    color:white;
}

.badge-role{
    padding:8px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

.badge-admin{
    background:var(--green-light);
    color:var(--green-dark);
}

.badge-manager{
    background:var(--pink-light);
    color:var(--pink-dark);
}

.badge-sales{
    background:#e8f8f2;
    color:#2a9e6e;
}

.table th{
    border-top:none !important;
    font-weight:700;
    color:#555;
}

.table td{
    vertical-align:middle !important;
}

.user-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(
        135deg,
        var(--green),
        var(--pink)
    );
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    margin-right:12px;
}

.user-info{
    display:flex;
    align-items:center;
}

.user-name{
    font-weight:600;
    color:#333;
}

.user-username{
    font-size:12px;
    color:#888;
}
</style>

<div class="container-fluid">

    <!-- HERO -->
    <div class="page-header">

        <h3 class="mb-1 font-weight-bold">
            Manajemen User
        </h3>

        <p class="mb-0" style="opacity:.9;">
            Kelola akun pengguna yang dapat mengakses sistem konveksi.
        </p>

    </div>

    <!-- CARD -->
    <div class="card table-card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                <i class="fas fa-users mr-2"></i>
                Data User
            </h5>

            <a href="<?= base_url('user/tambah') ?>"
               class="btn btn-green">
                <i class="fas fa-plus mr-1"></i>
                Tambah User
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th>User</th>
                            <th>Role</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $no=1; foreach($users as $u): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td>

                                <div class="user-info">

                                    <div class="user-avatar">
                                        <?= strtoupper(substr($u->nama,0,1)); ?>
                                    </div>

                                    <div>

                                        <div class="user-name">
                                            <?= $u->nama ?>
                                        </div>

                                        <div class="user-username">
                                            @<?= $u->username ?>
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <?php if($u->role=='admin'): ?>

                                    <span class="badge-role badge-admin">
                                        Admin
                                    </span>

                                <?php elseif($u->role=='manager'): ?>

                                    <span class="badge-role badge-manager">
                                        Manager
                                    </span>

                                <?php else: ?>

                                    <span class="badge-role badge-sales">
                                        Sales
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a href="<?= base_url('user/edit/'.$u->id) ?>"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="<?= base_url('user/hapus/'.$u->id) ?>"
                                   class="btn btn-pink btn-sm"
                                   onclick="return confirm('Hapus data?')">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($users)): ?>

                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                Belum ada data user.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>