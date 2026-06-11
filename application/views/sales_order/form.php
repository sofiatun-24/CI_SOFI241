<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

<style>
    :root {
        --green:      #3dbb85;
        --green-dark: #2a9e6e;
        --green-light:#e8f8f2;
        --pink:       #e97fa8;
        --pink-dark:  #d4608e;
        --pink-light: #fce8f1;
    }
    body { background-color: #f7faf9 !important; }

    .page-hero {
        background: linear-gradient(135deg, var(--green), var(--green-dark));
        border-radius: 16px;
        padding: 22px 28px;
        color: #fff;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content:""; position:absolute;
        width:160px; height:160px;
        background:rgba(255,255,255,.08);
        border-radius:50%; right:-40px; top:-60px;
    }
    .page-hero-content { position:relative; z-index:2; }

    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,.06);
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1.5px solid #e2e8f0;
        padding: 9px 14px;
        font-size: 13px;
        transition: .2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(61,187,133,.15);
    }
    label {
        font-weight: 600;
        font-size: 13px;
        color: #4a5568;
        margin-bottom: 6px;
    }

    /* produk row */
    .produk-row {
        background: #f7faf9;
        border: 1.5px solid #e8f8f2;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 10px;
        transition: .2s;
    }
    .produk-row:hover { border-color: var(--green); }

    .subtotal-display {
        background: var(--green-light) !important;
        color: var(--green-dark) !important;
        font-weight: 700;
        border-color: #c2edd9 !important;
    }

    /* total bar */
    .total-bar {
        background: linear-gradient(135deg, var(--green-light), #f0fdf9);
        border: 1.5px solid #c2edd9;
        border-radius: 12px;
        padding: 16px 20px;
        margin-top: 16px;
    }
    .total-label { font-size: 13px; color: #4a5568; font-weight: 600; }
    .total-value { font-size: 22px; font-weight: 700; color: var(--green-dark); }

    /* buttons */
    .btn-green {
        background: var(--green); color: #fff;
        border: none; border-radius: 10px;
        padding: 10px 24px; font-weight: 600;
    }
    .btn-green:hover { background: var(--green-dark); color: #fff; }
    .btn-tambah {
        background: var(--green-light); color: var(--green-dark);
        border: 1.5px dashed var(--green); border-radius: 10px;
        padding: 8px 18px; font-weight: 600; font-size: 13px;
        width: 100%; margin-top: 4px;
    }
    .btn-tambah:hover { background: var(--green); color: #fff; }
    .btn-hapus-row {
        background: var(--pink-light); color: var(--pink-dark);
        border: 1px solid var(--pink-light); border-radius: 8px;
        padding: 6px 12px; font-size: 12px;
    }
    .btn-hapus-row:hover { background: var(--pink); color: #fff; }
    .btn-batal {
        background: #f1f5f9; color: #64748b;
        border: none; border-radius: 10px;
        padding: 10px 20px; font-weight: 600;
    }
    .btn-batal:hover { background: #e2e8f0; color: #475569; }

    .section-label {
        font-size: 13px; font-weight: 700;
        color: #2d3748; margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--green-light);
        display: flex; align-items: center; gap: 8px;
    }
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-content d-flex align-items-center">
        <a href="<?= site_url('salesorder') ?>"
           style="background:rgba(255,255,255,.2); border-radius:10px; padding:7px 14px;
                  color:#fff; font-size:13px; font-weight:600; margin-right:16px; text-decoration:none;">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
        <div>
            <h5 class="font-weight-bold mb-0">
                <i class="fas fa-cart-plus mr-2"></i> Buat Sales Order Baru
            </h5>
            <p class="mb-0" style="opacity:.85; font-size:13px;">
                Isi form di bawah untuk membuat order baru
            </p>
        </div>
    </div>
</div>

<!-- FORM CARD -->
<div class="card card-modern">
    <div class="card-body p-4">
        <form action="<?= site_url('salesorder/simpan') ?>" method="POST">

            <!-- PILIH PELANGGAN -->
            <div class="section-label">
                <i class="fas fa-user" style="color:var(--green);"></i> Data Pelanggan
            </div>
            <div class="form-group mb-4">
                <label><i class="fas fa-user mr-1" style="color:var(--green);"></i> Pilih Pelanggan</label>
                <select name="id_pelanggan" class="form-select" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <hr style="border-color:#f0f0f0; margin:20px 0;">

            <!-- DETAIL PRODUK -->
            <div class="section-label">
                <i class="fas fa-box" style="color:var(--green);"></i> Detail Produk
            </div>

            <!-- Header kolom -->
            <div class="row mb-2 px-1" style="font-size:12px; font-weight:700; color:#718096; text-transform:uppercase;">
                <div class="col-md-5">Produk</div>
                <div class="col-md-2">Qty</div>
                <div class="col-md-4">Subtotal</div>
                <div class="col-md-1"></div>
            </div>

            <div id="produk-container">
                <div class="produk-row row align-items-center">
                    <div class="col-md-5">
                        <select name="produk_id[]" class="form-select produk-select"
                                required onchange="hitungSubtotal(this)">
                            <option value="">-- Pilih Produk --</option>
                            <?php foreach ($produk as $p): ?>
                            <option value="<?= $p->id ?>" data-harga="<?= $p->harga ?>">
                                <?= $p->nama_produk ?> — Rp <?= number_format($p->harga, 0, ',', '.') ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="jumlah[]"
                               class="form-control jumlah-input"
                               placeholder="Qty" min="1"
                               required onchange="hitungSubtotal(this)">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control subtotal-display"
                               placeholder="Rp 0" readonly>
                    </div>
                    <div class="col-md-1 text-center">
                        <button type="button" class="btn btn-hapus-row btn-sm"
                                onclick="hapusBaris(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tombol tambah baris -->
            <button type="button" class="btn btn-tambah mt-2" onclick="tambahBaris()">
                <i class="fas fa-plus mr-1"></i> Tambah Produk
            </button>

            <!-- TOTAL BAR -->
            <div class="total-bar d-flex justify-content-between align-items-center">
                <div>
                    <div class="total-label">
                        <i class="fas fa-calculator mr-1" style="color:var(--green);"></i>
                        Total Harga
                    </div>
                    <div class="total-value" id="total-display">Rp 0</div>
                </div>
                <div class="d-flex" style="gap:10px;">
                    <a href="<?= site_url('salesorder') ?>" class="btn btn-batal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-green">
                        <i class="fas fa-save mr-1"></i> Simpan Order
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

</div>

<script>
// Opsi produk untuk baris baru
const produkOptions = `<?php foreach ($produk as $p): ?><option value="<?= $p->id ?>" data-harga="<?= $p->harga ?>"><?= $p->nama_produk ?> — Rp <?= number_format($p->harga, 0, ',', '.') ?></option><?php endforeach; ?>`;

function tambahBaris() {
    const container = document.getElementById('produk-container');
    const div = document.createElement('div');
    div.className = 'produk-row row align-items-center';
    div.innerHTML = `
        <div class="col-md-5">
            <select name="produk_id[]" class="form-select produk-select"
                    required onchange="hitungSubtotal(this)">
                <option value="">-- Pilih Produk --</option>
                ${produkOptions}
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="jumlah[]"
                   class="form-control jumlah-input"
                   placeholder="Qty" min="1"
                   required onchange="hitungSubtotal(this)">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control subtotal-display"
                   placeholder="Rp 0" readonly>
        </div>
        <div class="col-md-1 text-center">
            <button type="button" class="btn btn-hapus-row btn-sm"
                    onclick="hapusBaris(this)">
                <i class="fas fa-trash"></i>
            </button>
        </div>`;
    container.appendChild(div);
}

function hapusBaris(btn) {
    const rows = document.querySelectorAll('.produk-row');
    if (rows.length > 1) {
        btn.closest('.produk-row').remove();
        hitungTotal();
    } else {
        alert('Minimal harus ada 1 produk!');
    }
}

function hitungSubtotal(el) {
    const row      = el.closest('.produk-row');
    const select   = row.querySelector('.produk-select');
    const jumlah   = row.querySelector('.jumlah-input').value;
    const harga    = select.options[select.selectedIndex]?.dataset.harga || 0;
    const subtotal = harga * jumlah;

    row.querySelector('.subtotal-display').value =
        subtotal > 0 ? 'Rp ' + Number(subtotal).toLocaleString('id-ID') : 'Rp 0';

    hitungTotal();
}

function hitungTotal() {
    let total = 0;
    document.querySelectorAll('.produk-row').forEach(row => {
        const select = row.querySelector('.produk-select');
        const jumlah = parseFloat(row.querySelector('.jumlah-input').value) || 0;
        const harga  = parseFloat(select.options[select.selectedIndex]?.dataset.harga) || 0;
        total += harga * jumlah;
    });
    document.getElementById('total-display').textContent =
        'Rp ' + total.toLocaleString('id-ID');
}
</script>

<?php $this->load->view('templates/footer'); ?>