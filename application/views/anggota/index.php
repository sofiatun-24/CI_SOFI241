<div class="container-fluid">

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

    <a href="<?= base_url('anggota/tambah') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nomor Anggota</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
<tbody>
    <?php $no = 1; foreach ($anggota as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row->{'nomor_anggota'} ?></td>
        <td><?= $row->nama ?></td>
        <td><?= $row->telepon ?></td>
        <td><?= $row->email ?></td>
        <td>
            <?php if($row->status == 'Aktif'): ?>
                <span class="badge badge-success">Aktif</span>
            <?php else: ?>
                <span class="badge badge-danger">Tidak Aktif</span>
            <?php endif; ?>
        </td>
        <td>
            <a href="<?= base_url('anggota/edit/' . $row->{'nomor_anggota'}) ?>">Edit</a>
            <a href="<?= base_url('anggota/hapus/' . $row->{'nomor_anggota'}) ?>"
               onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data",
                "zeroRecords": "Tidak ada data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "sebelumnya"
                }
            }
        });
    });
</script>