<div class="container-fluid">

    <style>
        :root{
            --primary:#4e73df;
            --success:#1cc88a;
            --danger:#e74a3b;
            --warning:#f6c23e;
            --dark:#5a5c69;
            --light:#f8f9fc;
        }

        .page-title{
            font-weight:700;
            color:var(--dark);
        }

        .card-modern{
            border:none;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,.06);
        }

        .stat-card{
            border:none;
            border-radius:16px;
            transition:.3s;
        }

        .stat-card:hover{
            transform:translateY(-4px);
        }

        .table thead{
            background:linear-gradient(135deg, var(--primary), #6f86ff);
            color:white;
        }

        .table thead th{
            border:none !important;
            padding:14px;
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:.05em;
        }

        .table tbody td{
            padding:14px;
            vertical-align:middle;
        }

        .table tbody tr:hover{
            background:#f4f7ff;
            transition:.2s;
        }

        .avatar-user{
            width:38px;
            height:38px;
            border-radius:50%;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:600;
            font-size:14px;
            flex-shrink:0;
        }

        .badge-status{
            padding:7px 14px;
            border-radius:30px;
            font-size:12px;
            font-weight:500;
        }

        .btn-modern{
            border-radius:10px;
            padding:6px 12px;
            font-size:12px;
            font-weight:500;
        }

        .kode-badge{
            background:#f8f9fc;
            border:1px solid #e3e6f0;
            border-radius:8px;
            padding:7px 12px;
            display:inline-block;
            font-size:12px;
            font-weight:500;
        }

        .alert{
            border:none;
            border-radius:12px;
        }
    </style>

    <!-- ALERT -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">

            <i class="fas fa-check-circle mr-2"></i>
            <?= $this->session->flashdata('success') ?>

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>

        </div>
    <?php endif; ?>

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="page-title mb-1">
                <i class="fas fa-users text-primary mr-2"></i>
                Data Anggota
            </h3>

            <p class="text-muted mb-0" style="font-size:13px;">
                Kelola seluruh data anggota perpustakaan
            </p>
        </div>

        <a href="<?= base_url('anggota/tambah') ?>" class="btn btn-primary shadow-sm btn-modern">
            <i class="fas fa-plus mr-1"></i> Tambah Anggota
        </a>

    </div>

    <!-- STATISTIK -->
    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow-sm py-3">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="mr-3">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>

                        <div>
                            <p class="text-muted mb-1 small">
                                TOTAL ANGGOTA
                            </p>

                            <h3 class="mb-0 font-weight-bold text-primary">
                                <?= count($anggota); ?>
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow-sm py-3">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="mr-3">
                            <i class="fas fa-user-check fa-2x text-success"></i>
                        </div>

                        <div>
                            <p class="text-muted mb-1 small">
                                ANGGOTA AKTIF
                            </p>

                            <h3 class="mb-0 font-weight-bold text-success">
                                <?= count(array_filter((array)$anggota, function($a){ return $a->status == 'Aktif'; })); ?>
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow-sm py-3">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="mr-3">
                            <i class="fas fa-user-times fa-2x text-danger"></i>
                        </div>

                        <div>
                            <p class="text-muted mb-1 small">
                                TIDAK AKTIF
                            </p>

                            <h3 class="mb-0 font-weight-bold text-danger">
                                <?= count(array_filter((array)$anggota, function($a){ return $a->status == 'Tidak Aktif'; })); ?>
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="card card-modern">

        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">

            <h6 class="mb-0 font-weight-bold text-dark">
                <i class="fas fa-list text-primary mr-2"></i>
                Daftar Anggota
            </h6>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0" id="dataTable">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nomor Anggota</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    $avatarColors = ['primary','success','info','warning','danger'];
                    $no = 1;

                    foreach ($anggota as $i => $row):

                        $warna = $avatarColors[$i % count($avatarColors)];
                        $inisial = strtoupper(substr($row->nama, 0, 1));

                    ?>

                        <tr>

                            <td class="text-muted">
                                <?= $no++ ?>
                            </td>

                            <td>
                                <span class="kode-badge">
                                    <i class="fas fa-id-card mr-1 text-secondary"></i>
                                    <?= $row->{'nomor_anggota'} ?>
                                </span>
                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="avatar-user bg-<?= $warna ?> mr-2">
                                        <?= $inisial ?>
                                    </div>

                                    <span style="font-weight:500;">
                                        <?= $row->nama ?>
                                    </span>

                                </div>

                            </td>

                            <td class="text-muted">
                                <i class="fas fa-phone-alt mr-1"></i>
                                <?= $row->telepon ?>
                            </td>

                            <td class="text-muted">
                                <i class="fas fa-envelope mr-1"></i>
                                <?= $row->email ?>
                            </td>

                            <td class="text-center">

                                <?php if ($row->status == 'Aktif'): ?>

                                    <span class="badge badge-success badge-status">
                                        <i class="fas fa-circle mr-1" style="font-size:8px;"></i>
                                        Aktif
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-danger badge-status">
                                        <i class="fas fa-circle mr-1" style="font-size:8px;"></i>
                                        Tidak Aktif
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <a href="<?= base_url('anggota/edit/' . $row->{'nomor_anggota'}) ?>"
                                   class="btn btn-outline-primary btn-sm btn-modern mr-1">

                                    <i class="fas fa-edit mr-1"></i>
                                    Edit

                                </a>

                                <a href="<?= base_url('anggota/hapus/' . $row->{'nomor_anggota'}) ?>"
                                   class="btn btn-outline-danger btn-sm btn-modern"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="fas fa-trash mr-1"></i>
                                    Hapus

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white text-muted small">

        </div>

    </div>

</div>

<script>
$(document).ready(function() {

    $('#dataTable').DataTable({

        searching: true,

        language: {
            lengthMenu: "Tampilkan _MENU_ data",
            zeroRecords: "Tidak ada data ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(difilter dari _MAX_ total data)",
            search: "Cari :",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            }
        }

    });

});
</script>