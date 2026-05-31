<?php $this->load->view('templates/header'); ?>

<h4 class="mb-4"><i class="bi bi-cart-plus me-2"></i>Buat Sales Order Baru</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= base_url('salesorder/simpan') ?>" method="POST">

            <div class="mb-3">
                <label class="form-label">Pelanggan</label>
                <select name="id_pelanggan" class="form-select" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <hr>
            <h6>Detail Produk</h6>
            <div id="produk-container">
                <div class="row mb-2 produk-row">
                    <div class="col-md-6">
                        <select name="produk_id[]" class="form-select produk-select" required onchange="hitungSubtotal(this)">
                            <option value="">-- Pilih Produk --</option>
                            <?php foreach ($produk as $p): ?>
                            <option value="<?= $p->id ?>" data-harga="<?= $p->harga ?>">
                                <?= $p->nama_produk ?> - Rp <?= number_format($p->harga,0,',','.') ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="jumlah[]" class="form-control jumlah-input"
                               placeholder="Qty" min="1" required onchange="hitungSubtotal(this)">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control subtotal-display" placeholder="Subtotal" readonly>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-outline-secondary btn-sm mb-3" onclick="tambahBaris()">
                <i class="bi bi-plus me-1"></i> Tambah Produk
            </button>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <h5>Total: <strong id="total-display">Rp 0</strong></h5>
                <div>
                    <a href="<?= base_url('salesorder') ?>" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Order
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Template baris produk
const produkOptions = `<?php foreach ($produk as $p): ?>
    <option value="<?= $p->id ?>" data-harga="<?= $p->harga ?>">
        <?= $p->nama_produk ?> - Rp <?= number_format($p->harga,0,',','.') ?>
    </option><?php endforeach; ?>`;

function tambahBaris() {
    const container = document.getElementById('produk-container');
    const div = document.createElement('div');
    div.className = 'row mb-2 produk-row';
    div.innerHTML = `
        <div class="col-md-6">
            <select name="produk_id[]" class="form-select produk-select" required onchange="hitungSubtotal(this)">
                <option value="">-- Pilih Produk --</option>
                ${produkOptions}
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="jumlah[]" class="form-control jumlah-input"
                   placeholder="Qty" min="1" required onchange="hitungSubtotal(this)">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control subtotal-display" placeholder="Subtotal" readonly>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">
                <i class="bi bi-trash"></i>
            </button>
        </div>`;
    container.appendChild(div);
}

function hapusBaris(btn) {
    const rows = document.querySelectorAll('.produk-row');
    if (rows.length > 1) {
        btn.closest('.produk-row').remove();
        hitungTotal();
    }
}

function hitungSubtotal(el) {
    const row     = el.closest('.produk-row');
    const select  = row.querySelector('.produk-select');
    const jumlah  = row.querySelector('.jumlah-input').value;
    const harga   = select.options[select.selectedIndex]?.dataset.harga || 0;
    const subtotal = harga * jumlah;
    row.querySelector('.subtotal-display').value =
        'Rp ' + subtotal.toLocaleString('id-ID');
    hitungTotal();
}

function hitungTotal() {
    let total = 0;
    document.querySelectorAll('.produk-row').forEach(row => {
        const select = row.querySelector('.produk-select');
        const jumlah = row.querySelector('.jumlah-input').value || 0;
        const harga  = select.options[select.selectedIndex]?.dataset.harga || 0;
        total += harga * jumlah;
    });
    document.getElementById('total-display').textContent =
        'Rp ' + total.toLocaleString('id-ID');
}
</script>

<?php $this->load->view('templates/footer'); ?>