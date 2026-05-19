<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"><b>Data Peminjaman</b></h2>

<a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah</a>

    <!-- Card Tabel -->

        <div class="card-body">
            <div class="table-responsive">
                <?php if($this->session->flashdata('success')): ?>

<div class="alert alert-success alert-dismissible fade show">

    <?= $this->session->flashdata('success'); ?>

    <button type="button"
            class="close"
            data-dismiss="alert">

        <span>&times;</span>

    </button>

</div>

<?php endif; ?>


<?php if($this->session->flashdata('error')): ?>

<div class="alert alert-danger alert-dismissible fade show">

    <?= $this->session->flashdata('error'); ?>

    <button type="button"
            class="close"
            data-dismiss="alert">

        <span>&times;</span>

    </button>

</div>

<?php endif; ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead class="thead-dark">

        <tr>
            <th>No</th>
            <th>Kode Peminjaman</th>
            <th>Nama Anggota</th>
            <th>Tanggal Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

    </thead>

    <tbody>

        <?php $no = 1; foreach($data as $d): ?>

        <tr>

            <td><?= $no++ ?></td>
            <td><?= $d->kode_peminjaman; ?></td>
            <td><?= $d->nama; ?></td>
            <td><?= $d->tanggal_pinjam; ?></td>
            <td><?= $d->tanggal_jatuh_tempo; ?></td>
            <td><?= $d->status; ?></td>
            
            <td>
            <?php
            $today = date('Y-m-d');

            $selisih = strtotime($today) - strtotime($d->tanggal_jatuh_tempo);

            $terlambat = $selisih > 0
            ? floor($selisih / 86400)
            : 0;
            ?>

                <?php if($d->status == 'dipinjam'): ?>

                <a href="<?= site_url('peminjaman/kembali/'.$d->id); ?>" 
                class="btn btn-success btn-sm"
                onclick="return confirm('Konfirmasi pengembalian buku ini?')">

                    Kembalikan

                </a>

                <!--- tombol WA --->
                <a href="<?= site_url('whatsapp/kirim_notifikasi/'.$d->id); ?>"
                class="btn btn-warning btn-sm">

                <i class="fab fa-whatsapp"></i>
                Kirim WA
                </a>

                <?php else: ?>

                    Sudah Dikembalikan

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

<script>
    const rows = document.querySelectorAll('#dataTable tbody tr');
    document.getElementById('jumlahData').innerText = rows.length + ' data';

    function cariData(keyword) {
        const filter = keyword.toLowerCase();
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
        });
    }
</script>