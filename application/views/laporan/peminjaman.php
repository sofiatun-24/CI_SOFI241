<div class="container-fluid">

    <style>
        :root{
            --primary:#4e73df;
            --success:#1cc88a;
            --secondary:#858796;
            --danger:#e74a3b;
            --light:#f8f9fc;
            --dark:#5a5c69;
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

        .btn-modern{
            border-radius:10px;
            padding:8px 16px;
            font-size:13px;
            font-weight:500;
        }

        .form-control{
            border-radius:10px;
            height:42px;
        }

        .badge-status{
            padding:7px 14px;
            border-radius:20px;
            font-size:12px;
            font-weight:500;
        }

        .filter-box{
            background:white;
            border-radius:16px;
            padding:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
        }
    </style>

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="page-title mb-1">
                <i class="fas fa-file-alt text-primary mr-2"></i>
                Laporan Peminjaman
            </h3>

            <p class="text-muted mb-0" style="font-size:13px;">
                Data laporan seluruh peminjaman buku
            </p>
        </div>

        <a href="<?= site_url('peminjaman/cetak_peminjaman?bulan='. $bulan); ?>"
           target="_blank"
           class="btn btn-success btn-modern shadow-sm">

            <i class="fas fa-file-pdf mr-1"></i>
            Cetak PDF

        </a>

    </div>

    <!-- FILTER -->
    <div class="filter-box mb-4">

        <form method="get">

            <div class="row align-items-end">

                <div class="col-md-4 mb-2">

                    <label class="small text-muted font-weight-bold">
                        Filter Bulan
                    </label>

                    <input type="month"
                           name="bulan"
                           value="<?= $bulan; ?>"
                           class="form-control">

                </div>

                <div class="col-md-8 mb-2">

                    <button type="submit"
                            class="btn btn-primary btn-modern">

                        <i class="fas fa-filter mr-1"></i>
                        Filter

                    </button>

                    <a href="<?= site_url('laporan/peminjaman');?>"
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
                Data Peminjaman
            </h6>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tanggal Pinjam</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if(!empty($data)): ?>

                        <?php $no=1; foreach($data as $d): ?>

                        <tr>

                            <td class="text-muted">
                                <?= $no++; ?>
                            </td>

                            <td>
                                <span class="badge badge-light border px-3 py-2">
                                    <?= $d->kode_peminjaman; ?>
                                </span>
                            </td>

                            <td style="font-weight:500;">
                                <?= $d->nama; ?>
                            </td>

                            <td>
                                <i class="fas fa-calendar-alt text-muted mr-1"></i>
                                <?= date('d M Y', strtotime($d->tanggal_pinjam)); ?>
                            </td>

                            <td class="text-center">

                                <?php if($d->status == 'dipinjam'): ?>

                                    <span class="badge badge-danger badge-status">
                                        <i class="fas fa-book mr-1"></i>
                                        Dipinjam
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-success badge-status">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Dikembalikan
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">

                                <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>

                                Tidak ada data peminjaman

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