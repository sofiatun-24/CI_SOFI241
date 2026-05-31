<div class="container-fluid">

    <a href="<?= base_url('user/tambah') ?>"
       class="btn btn-primary mb-3">
       Tambah User
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php $no=1; foreach($users as $u): ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $u->nama ?></td>
                <td><?= $u->username ?></td>
                <td><?= ucfirst($u->role) ?></td>

                <td>
                    <a href="<?= base_url('user/edit/'.$u->id) ?>"
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <a href="<?= base_url('user/hapus/'.$u->id) ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus data?')">
                       Hapus
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

</div>