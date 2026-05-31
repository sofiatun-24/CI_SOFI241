<?php $this->load->view('templates/header'); ?>

<h4 class="mb-4"><i class="bi bi-bar-chart me-2"></i>Laporan Penjualan</h4>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="<?= base_url('laporan') ?>" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="dari" class="form-control" value="<?= $dari ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="sampai" class="form-control" value="<?= $sampai ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search me-1"></i> Filter
                </button>
                <a href="<?= base_url('laporan/export_pdf?dari='.$dari.'&sampai='.$sampai) ?>"
                   class="btn btn-danger">
                    <i class="bi bi-file-pdf me-1"></i> Export PDF
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th><th>No. Order</th><th>Tanggal</th>
                    <th>Sales</th><th>Pelanggan</th><th>Total</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $grand_total = 0; foreach ($laporan as $i => $l): $grand_total += $l->total_harga; ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $l->no_order ?></td>
                <td><?= date('d/m/Y', strtotime($l->tanggal)) ?></td>
                <td><?= $l->nama_sales ?></td>
                <td><?= $l->nama_pelanggan ?></td>
                <td>Rp <?= number_format($l->total_harga, 0, ',', '.') ?></td>
                <td><span class="badge bg-success"><?= ucfirst($l->status) ?></span></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="table-dark">
                    <th colspan="5" class="text-end">GRAND TOTAL</th>
                    <th colspan="2">Rp <?= number_format($grand_total, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>