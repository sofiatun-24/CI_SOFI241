<div class="container-fluid">

    <style>
        :root{
            --primary:#6c5ce7;
            --secondary:#a29bfe;
            --success:#00b894;
            --danger:#d63031;
            --light:#f8f9fc;
        }

        .title-page{
            color: var(--primary);
            font-weight: bold;
        }

        .btn-custom{
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 16px;
            transition: .3s;
        }

        .btn-custom:hover{
            transform: scale(1.03);
            color: white;
            box-shadow: 0 5px 15px rgba(108,92,231,.3);
        }

        .card-custom{
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
        }

        .table thead{
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .table tbody tr:hover{
            background: #f3f0ff;
            transition: .2s;
        }

        .badge-status{
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
        }

        .status-pinjam{
            background: var(--danger);
        }

        .status-kembali{
            background: var(--success);
        }

        .btn-kembali{
            background: var(--success);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 5px 12px;
        }

        .btn-kembali:hover{
            opacity: .9;
            color: white;
        }
    </style>

    <h2 class="h3 mb-4 title-page">
        <i class="fas fa-book-reader"></i> Data Peminjaman
    </h2>

    <a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-custom mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>

    <div class="card card-custom mb-4">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $no=1; foreach($data as $d): ?>

                        <tr>
                            <td><?= $no++; ?></td>

                            <td>
                                <b><?= $d->kode_peminjaman; ?></b>
                            </td>

                            <td><?= $d->nama; ?></td>

                            <td><?= date('d M Y', strtotime($d->tanggal_pinjam)); ?></td>

                            <td>
                                <?php if($d->status=='dipinjam'): ?>
                                    <span class="badge-status status-pinjam">
                                        Dipinjam
                                    </span>
                                <?php else: ?>
                                    <span class="badge-status status-kembali">
                                        Dikembalikan
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($d->status=='dipinjam'):?>
                                    <a href="<?= site_url('peminjaman/kembali/'.$d->id); ?>"
                                       class="btn btn-kembali btn-sm">
                                        <i class="fas fa-undo"></i> Kembalikan
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