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
            color: var(--dark);
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
            transform:translateY(-3px);
        }

        .table thead{
            background: linear-gradient(135deg, var(--primary), #6f86ff);
            color:white;
        }

        .table thead th{
            border:none !important;
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:.05em;
            padding:14px;
        }

        .table tbody td{
            padding:14px;
            vertical-align:middle;
        }

        .table tbody tr:hover{
            background:#f4f7ff;
            transition:.2s;
        }

        .badge-kategori{
            font-size:13px;
            padding:10px 14px;
            border-radius:30px;
            font-weight:500;
        }

        .search-box{
            border-radius:12px;
            overflow:hidden;
        }

        .search-box input{
            border-left:none;
            box-shadow:none !important;
        }

        .search-box .input-group-text{
            background:white;
            border-right:none;
        }

        .btn-modern{
            border-radius:10px;
            padding:7px 14px;
            font-size:13px;
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
                <i class="fas fa-folder-open text-primary mr-2"></i>
                Data Kategori
            </h3>
            <p class="text-muted mb-0" style="font-size:13px;">
                Kelola seluruh kategori buku perpustakaan
            </p>
        </div>

        <a href="<?= site_url('kategori/tambah'); ?>" class="btn btn-success btn-modern shadow-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Kategori
        </a>

    </div>

    <!-- STATISTIK -->
    <div class="row mb-4">

        <div class="col-md-4 mb-3">
            <div class="card stat-card shadow-sm py-3 text-center">
                <p class="text-muted mb-1 small">TOTAL KATEGORI</p>
                <h3 class="font-weight-bold text-dark mb-0">
                    <?= count($kategori); ?>
                </h3>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card stat-card shadow-sm py-3 text-center">
                <p class="text-muted mb-1 small">TOTAL BUKU</p>
                <h3 class="font-weight-bold text-primary mb-0">
                    <?= $total_buku; ?>
                </h3>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card stat-card shadow-sm py-3 text-center">
                <p class="text-muted mb-1 small">KATEGORI AKTIF</p>
                <h3 class="font-weight-bold text-success mb-0">
                    <?= count($kategori); ?>
                </h3>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="card card-modern">

        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">

            <h6 class="mb-0 font-weight-bold text-dark">
                <i class="fas fa-list text-success mr-2"></i>
                Daftar Kategori
            </h6>

            <div class="input-group search-box" style="width:260px;">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                </div>

                <input type="text"
                    id="cariInput"
                    class="form-control"
                    placeholder="Cari kategori...">

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Jumlah Buku</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    $colors = ['success', 'primary', 'info', 'warning', 'danger', 'secondary'];
                    $icons  = ['fa-book', 'fa-code', 'fa-flask', 'fa-music', 'fa-paint-brush', 'fa-calculator'];

                    $no = 1;

                    foreach ($kategori as $i => $k) :

                        $color = $colors[$i % count($colors)];
                        $icon  = $icons[$i % count($icons)];
                    ?>

                        <tr class="kategori-row">

                            <td class="text-muted">
                                <?= $no++; ?>
                            </td>

                            <td>
                                <span class="badge badge-<?= $color; ?> badge-kategori">
                                    <i class="fas <?= $icon; ?> mr-1"></i>
                                    <?= $k->nama_kategori; ?>
                                </span>
                            </td>

                            <td class="text-center text-muted">
                                <?= isset($k->jumlah_buku) ? $k->jumlah_buku : 0; ?> buku
                            </td>

                            <td class="text-right">

                                <a href="<?= site_url('kategori/edit/' . $k->id); ?>"
                                   class="btn btn-outline-primary btn-sm btn-modern">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>

                                <a href="<?= site_url('kategori/hapus/' . $k->id); ?>"
                                   class="btn btn-outline-danger btn-sm btn-modern"
                                   onclick="return confirm('Yakin ingin menghapus kategori <?= $k->nama_kategori; ?> ?')">

                                    <i class="fas fa-trash mr-1"></i> Hapus

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

                <?php if (empty($kategori)) : ?>

                    <div class="empty-state text-center text-muted">

                        <i class="fas fa-folder-open mb-3 d-block"></i>

                        <h5>Belum Ada Kategori</h5>

                        <p class="mb-3">
                            Silakan tambahkan kategori baru terlebih dahulu.
                        </p>

                        <a href="<?= site_url('kategori/tambah'); ?>"
                           class="btn btn-success btn-modern">

                            <i class="fas fa-plus mr-1"></i>
                            Tambah Kategori

                        </a>

                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

</div>

<script>
document.getElementById('cariInput').addEventListener('keyup', function () {

    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll('.kategori-row');

    rows.forEach(function(row){

        let nama = row.querySelector('td:nth-child(2)')
                      .textContent
                      .toLowerCase();

        row.style.display = nama.includes(input) ? '' : 'none';

    });

});
</script>