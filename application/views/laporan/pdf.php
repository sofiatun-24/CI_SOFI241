<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan - PT Maju Jaya</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }

        .header { text-align: center; margin-bottom: 16px; }
        .header h2 { margin: 0 0 4px; font-size: 16px; }
        .header p  { margin: 2px 0; font-size: 12px; }
        .divider   { border: none; border-top: 2px solid #000; margin: 10px 0 4px; }
        .divider2  { border: none; border-top: 1px solid #000; margin: 4px 0 16px; }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 12px;
        }

        /* stat boxes */
        .stat-row { display: flex; gap: 12px; margin-bottom: 16px; }
        .stat-box {
            flex: 1; border: 1px solid #ccc;
            border-radius: 6px; padding: 8px 12px;
            text-align: center;
        }
        .stat-box .label { font-size: 10px; color: #555; text-transform: uppercase; margin-bottom: 4px; }
        .stat-box .value { font-size: 14px; font-weight: 700; }

        /* table */
        table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        th {
            background: #2a9e6e;
            color: #fff;
            padding: 8px;
            text-align: center;
            font-size: 11px;
            border: 1px solid #2a9e6e;
        }
        td {
            padding: 7px 8px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 11px;
        }
        tr:nth-child(even) { background: #f2fdf8; }
        tfoot td {
            background: #e8f8f2;
            font-weight: 700;
            border: 1px solid #aaa;
        }

        /* ttd */
        .ttd-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            font-size: 12px;
        }
        .ttd-box { text-align: center; width: 160px; }
        .ttd-box .ttd-line {
            border-top: 1px solid #000;
            margin-top: 50px;
            padding-top: 4px;
        }

        /* catatan */
        .catatan { font-size: 10px; color: #555; margin-top: 8px; }

        @media print {
            .no-print { display: none !important; }
            body { margin: 0; }
        }
    </style>
</head>
<body>

    <!-- TOMBOL CETAK (hilang saat print) -->
    <div class="no-print" style="text-align:right; margin-bottom:12px;">
        <button onclick="window.print()"
                style="background:#2a9e6e; color:#fff; border:none; padding:8px 20px;
                       border-radius:8px; font-size:13px; cursor:pointer;">
            🖨️ Cetak Laporan
        </button>
        <button onclick="window.history.back()"
                style="background:#e97fa8; color:#fff; border:none; padding:8px 20px;
                       border-radius:8px; font-size:13px; cursor:pointer; margin-left:8px;">
            ← Kembali
        </button>
    </div>

    <!-- HEADER -->
    <div class="header">
        <h2>PT MAJU JAYA</h2>
        <p>Sales Order Management System</p>
        <hr class="divider">
        <h3 style="margin:6px 0; font-size:14px;">LAPORAN PENJUALAN</h3>
        <p>Periode: <?= date('d M Y', strtotime($dari)) ?> s/d <?= date('d M Y', strtotime($sampai)) ?></p>
        <hr class="divider2">
    </div>

    <!-- INFO -->
    <div class="info-row">
        <span>Dicetak oleh: <strong><?= $this->session->userdata('nama') ?></strong>
            (<?= ucfirst($this->session->userdata('role')) ?>)
        </span>
        <span>Tanggal cetak: <strong><?= date('d M Y, H:i') ?> WIB</strong></span>
    </div>

    <!-- STAT BOXES -->
    <?php
        $total_order = count($laporan);
        $rata_rata   = $total_order > 0 ? $grand_total / $total_order : 0;
    ?>
    <div class="stat-row">
        <div class="stat-box">
            <div class="label">Total Order</div>
            <div class="value"><?= $total_order ?> order</div>
        </div>
        <div class="stat-box">
            <div class="label">Grand Total</div>
            <div class="value">Rp <?= number_format($grand_total, 0, ',', '.') ?></div>
        </div>
        <div class="stat-box">
            <div class="label">Rata-rata / Order</div>
            <div class="value">Rp <?= number_format($rata_rata, 0, ',', '.') ?></div>
        </div>
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Order</th>
                <th>Tanggal</th>
                <th>Sales</th>
                <th>Pelanggan</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($laporan as $l): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><strong><?= $l->no_order ?></strong></td>
            <td><?= date('d/m/Y', strtotime($l->tanggal)) ?></td>
            <td><?= $l->nama_sales ?></td>
            <td><?= $l->nama_pelanggan ?></td>
            <td><strong>Rp <?= number_format($l->total_harga, 0, ',', '.') ?></strong></td>
            <td><?= ucfirst($l->status) ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align:right;">GRAND TOTAL</td>
                <td colspan="2">Rp <?= number_format($grand_total, 0, ',', '.') ?></td>
            </tr>
        </tfoot>
    </table>

    <!-- TTD -->
    <div class="ttd-section">
        <div class="catatan">
            * Laporan ini digenerate otomatis oleh sistem.<br>
            * Data tidak termasuk order yang dibatalkan.
        </div>
        <div class="ttd-box">
            Tangerang, <?= date('d M Y') ?>
            <div class="ttd-line">Manager</div>
        </div>
    </div>

    <script>
        window.print();
    </script>

</body>
</html>