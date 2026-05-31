<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-file-text me-2"></i>Detail Order - <?= $order->no_order ?></h4>
    <a href="<?= base_url('salesorder') ?>" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-dark text-white">Informasi Order</div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr><td>No. Order</td><td>: <strong><?= $order->no_order ?></strong></td></tr>
                    <tr><td>Tanggal</td><td>: <?= date('d/m/Y', strtotime($order->tanggal)) ?></td></tr>
                    <tr><td>Sales</td><td>: <?= $order->nama_sales ?></td></tr>
                    <tr><td>Pelanggan</td><td>: <?= $order->nama_pelanggan ?></td></tr>
                    <tr><td>Alamat</td><td>: <?= $order->alamat ?></td></tr>
                    <tr><td>Telepon</td><td>: <?= $order->no_telepon ?></td></tr>
                    <tr><td>Status</td><td>:
                        <?php $badge = ['draft'=>'secondary','dikirim'=>'primary','selesai'=>'success','dibatalkan'=>'danger']; ?>
                        <span class="badge bg-<?= $badge[$order->status] ?>"><?= ucfirst($order->status) ?></span>
                    </td></tr>
                </table>
            </div>
        </div>
    </div>

    <?php if ($this->session->userdata('role') == 'admin'): ?>
    <div class="col-md-6">
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-dark text-white">Update Status</div>
            <div class="card-body">
                <form action="<?= base_url('salesorder/update_status/'.$order->id) ?>" method="POST">
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <?php foreach (['draft','dikirim','selesai','dibatalkan'] as $s): ?>
                            <option value="<?= $s ?>" <?= $order->status == $s ? 'selected' : '' ?>>
                                <?= ucfirst($s) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Status</button>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">Detail Produk</div>
    <div class="card-body">
        <table class="table">
            <thead><tr><th>#</th><th>Produk</th><th>Kode</th><th>Harga Satuan</th><th>Qty</th><th>Subtotal</th></tr></thead>
            <tbody>
            <?php foreach ($detail as $i => $d): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $d->nama_produk ?></td>
                <td><?= $d->kode_produk ?></td>
                <td>Rp <?= number_format($d->harga_satuan, 0, ',', '.') ?></td>
                <td><?= $d->jumlah ?></td>
                <td>Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="table-dark">
                    <th colspan="5" class="text-end">TOTAL</th>
                    <th>Rp <?= number_format($order->total_harga, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>