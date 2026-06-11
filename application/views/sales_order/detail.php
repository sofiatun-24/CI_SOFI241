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
    background:linear-gradient(
        135deg,
        var(--green),
        var(--green-dark),
        var(--pink)
    );
    color:#fff;
    border-radius:18px;
    padding:25px 30px;
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
    background:rgba(255,255,255,.05);
    bottom:-50px;
    right:80px;
}

.card-modern{
    border:none;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.card-modern .card-header{
    background:#fff;
    border-bottom:1px solid #eee;
    font-weight:600;
    padding:18px 25px;
}

.card-modern .card-body{
    padding:25px;
}

.btn-green{
    background:var(--green);
    color:#fff;
    border:none;
    border-radius:10px;
}

.btn-green:hover{
    background:var(--green-dark);
    color:#fff;
}

.badge-status{
    padding:8px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

.status-draft{
    background:#f1f1f1;
    color:#666;
}

.status-dikirim{
    background:#dff3ff;
    color:#0d6efd;
}

.status-selesai{
    background:#e8f8f2;
    color:#2a9e6e;
}

.status-dibatalkan{
    background:#ffe6e6;
    color:#dc3545;
}

.total-box{
    background:linear-gradient(
        135deg,
        var(--green),
        var(--pink)
    );
    color:white;
    border-radius:15px;
    padding:20px;
    text-align:center;
}

.table thead{
    background:var(--green);
    color:white;
}

.table thead th{
    border:none;
}

.table td{
    vertical-align:middle;
}
</style>

<div class="container-fluid">

    <!-- HERO -->
    <div class="page-header d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-1 font-weight-bold">
                Detail Sales Order
            </h3>

            <p class="mb-0" style="opacity:.9;">
                <?= $order->no_order ?>
            </p>
        </div>

<a href="<?= site_url('salesorder') ?>"
   class="btn btn-light"
   style="position:relative; z-index:999;">
    <i class="fas fa-arrow-left mr-1"></i>
    Kembali
</a>

    </div>

    <div class="row">

        <!-- INFORMASI ORDER -->
        <div class="col-lg-8">

            <div class="card card-modern mb-4">

                <div class="card-header">
                    <i class="fas fa-file-invoice mr-2"></i>
                    Informasi Order
                </div>

                <div class="card-body">

                    <table class="table table-borderless mb-0">

                        <tr>
                            <td width="180">No Order</td>
                            <td><strong><?= $order->no_order ?></strong></td>
                        </tr>

                        <tr>
                            <td>Tanggal</td>
                            <td><?= date('d F Y', strtotime($order->tanggal)) ?></td>
                        </tr>

                        <tr>
                            <td>Sales</td>
                            <td><?= $order->nama_sales ?></td>
                        </tr>

                        <tr>
                            <td>Pelanggan</td>
                            <td><?= $order->nama_pelanggan ?></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td><?= $order->alamat ?></td>
                        </tr>

                        <tr>
                            <td>Telepon</td>
                            <td><?= $order->no_telepon ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>

                                <?php if($order->status=='draft'): ?>
                                    <span class="badge-status status-draft">Draft</span>

                                <?php elseif($order->status=='dikirim'): ?>
                                    <span class="badge-status status-dikirim">Dikirim</span>

                                <?php elseif($order->status=='selesai'): ?>
                                    <span class="badge-status status-selesai">Selesai</span>

                                <?php else: ?>
                                    <span class="badge-status status-dibatalkan">Dibatalkan</span>
                                <?php endif; ?>

                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- TOTAL -->
        <div class="col-lg-4">

            <div class="total-box mb-4">

                <div style="font-size:14px;">
                    Total Order
                </div>

                <h2 class="font-weight-bold mb-0">
                    Rp <?= number_format($order->total_harga,0,',','.') ?>
                </h2>

            </div>

            <?php if($this->session->userdata('role') == 'admin'): ?>

            <div class="card card-modern">

                <div class="card-header">
                    Update Status
                </div>

                <div class="card-body">

                    <form action="<?= base_url('salesorder/update_status/'.$order->id) ?>"
                          method="POST">

                        <div class="form-group">

                            <select name="status" class="form-control">

                                <?php foreach(['draft','dikirim','selesai','dibatalkan'] as $s): ?>

                                <option value="<?= $s ?>"
                                    <?= $order->status==$s ? 'selected' : '' ?>>

                                    <?= ucfirst($s) ?>

                                </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <button type="submit"
                                class="btn btn-green btn-block">

                            Update Status

                        </button>

                    </form>

                </div>

            </div>

            <?php endif; ?>

        </div>

    </div>

    <!-- DETAIL PRODUK -->
    <div class="card card-modern">

        <div class="card-header">
            <i class="fas fa-box mr-2"></i>
            Detail Produk
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Kode</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($detail as $i => $d): ?>

                        <tr>

                            <td><?= $i+1 ?></td>
                            <td><?= $d->nama_produk ?></td>
                            <td><?= $d->kode_produk ?></td>

                            <td>
                                Rp <?= number_format($d->harga_satuan,0,',','.') ?>
                            </td>

                            <td><?= $d->jumlah ?></td>

                            <td>
                                Rp <?= number_format($d->subtotal,0,',','.') ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                    <tfoot>

                        <tr style="background:#f8f9fa;font-weight:bold;">

                            <td colspan="5" class="text-right">
                                TOTAL
                            </td>

                            <td>
                                Rp <?= number_format($order->total_harga,0,',','.') ?>
                            </td>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('templates/footer'); ?>