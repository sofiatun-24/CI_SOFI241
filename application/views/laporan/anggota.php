<div class="container-fluid">

    <style>
        :root{
            --primary:#4e73df;
            --success:#1cc88a;
            --danger:#e74a3b;
            --secondary:#858796;
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

        .filter-box{
            background:white;
            border-radius:16px;
            padding:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
        }

        .form-control,
        .custom-select{
            border-radius:10px;
            height:42px;
        }

        .btn-modern{
            border-radius:10px;
            padding:8px 16px;
            font-size:13px;
            font-weight:500;
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
            font-size:13px;
        }

        .table tbody tr:hover{
            background:#f4f7ff;
            transition:.2s;
        }

        .badge-status{
            padding:7px 14px;
            border-radius:20px;
            font-size:12px;
            font-weight:500;
        }

        .kode-badge{
            background:#f8f9fc;
            border:1px solid #e3e6f0;
            border-radius:8px;
            padding:6px 10px;
            display:inline-block;
            font-size:12px;
            font-weight:500;
        }

        .empty-state{
            padding:60px 20px;
        }

        .empty-state i{
            font-size:60px;
            color:#d1d3e2;
        }
    </style>

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="page-title mb-1">
                <i class="fas fa-user-friends text-primary mr-2"></i>
                Laporan Anggota
            </h3>

            <p class="text-muted mb-0" style="font-size:13px;">
                Data laporan seluruh anggota perpustakaan
            </p>

        </div>

        <a href="<?= site_url('laporan/cetak_anggota?cari=' . $cari . '&status=' . $status); ?>"
           target="_blank"
           class="btn btn-success btn-modern shadow-sm">

            <i class="fas fa-file-pdf mr-1"></i>
            Cetak PDF

        </a>

    </div>

    <!-- FILTER -->
    <div class="filter-box mb-4">

        <form method="get">

            <div class="row">

                <div class="col-md-4 mb-2">

                    <label class="small text-muted font-weight-bold">
                        Cari Anggota
                    </label>

                    <input type="text"
                           name="cari"
                           class="form-control"
                           placeholder="Cari nama / nomor anggota..."
                           value="<?= $cari; ?>">

                </div>

                <div class="col-md-3 mb-2">

                    <label class="small text-muted font-weight-bold">
                        Status
                    </label>

                    <select name="status" class="custom-select">

                        <option value="">-- Semua Status --</option>

                        <option value="Aktif"
                            <?= ($status == 'Aktif') ? 'selected' : ''; ?>>

                            Aktif

                        </option>

                        <option value="Tidak Aktif"
                            <?= ($status == 'Tidak Aktif') ? 'selected' : ''; ?>>

                            Tidak Aktif

                        </option>

                    </select>

                </div>

                <div class="col-md-5 d-flex align-items-end mb-2">

                    <button type="submit"
                            class="btn btn-primary btn-modern mr-2">

                        <i class="fas fa-filter mr-1"></i>
                        Filter

                    </button>

                    <a href="<?= site_url('laporan/anggota'); ?>"
                       class="btn btn-secondary btn-modern">

                        <i class="fas fa-sync-alt mr-1"></i>
                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>

    <!-- TABLE -->
    <div class="card card-modern">

        <div class="card-header bg-white border-0 py-3">

            <h6 class="mb-0 font-weight-bold text-dark">
                <i class="fas fa-table text-primary mr-2"></i>
                Data Anggota
            </h6>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>Nomor Anggota</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center">Status</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if(!empty($data)): ?>

                        <?php $no = 1; foreach ($data as $d) : ?>

                        <tr>

                            <td class="text-muted">
                                <?= $no++; ?>
                            </td>

                            <td>

                                <span class="kode-badge">

                                    <i class="fas fa-id-card mr-1 text-secondary"></i>

                                    <?= $d->nomor_anggota; ?>

                                </span>

                            </td>

                            <td style="font-weight:500;">
                                <?= $d->nama; ?>
                            </td>

                            <td class="text-muted">
                                <?= $d->alamat; ?>
                            </td>

                            <td>

                                <i class="fas fa-phone-alt text-muted mr-1"></i>

                                <?= $d->telepon; ?>

                            </td>

                            <td>

                                <i class="fas fa-envelope text-muted mr-1"></i>

                                <?= $d->email; ?>

                            </td>

                            <td>

                                <i class="fas fa-calendar-alt text-muted mr-1"></i>

                                <?= date('d M Y', strtotime($d->tanggal_daftar)); ?>

                            </td>

                            <td class="text-center">

                                <?php if ($d->status == 'Aktif') : ?>

                                    <span class="badge badge-success badge-status">

                                        <i class="fas fa-check-circle mr-1"></i>

                                        Aktif

                                    </span>

                                <?php else : ?>

                                    <span class="badge badge-danger badge-status">

                                        <i class="fas fa-times-circle mr-1"></i>

                                        Tidak Aktif

                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="8" class="text-center empty-state text-muted">

                                <i class="fas fa-folder-open mb-3 d-block"></i>

                                Tidak ada data anggota

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white text-muted small">

            Total data :
            <strong><?= count($data); ?></strong>

        </div>

    </div>

</div>