</div><!-- end #content -->
</div><!-- end #content-wrapper -->
</div><!-- end #wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- jquery-easing -->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Chart.js -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

<!-- SB Admin 2 -->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- DataTable Init (otomatis untuk semua tabel dengan id="dataTable") -->
<script>
$(document).ready(function () {
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            language: {
                search:      "Cari:",
                lengthMenu:  "Tampilkan _MENU_ data",
                info:        "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty:   "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered:"(difilter dari _MAX_ total data)",
                zeroRecords: "Tidak ada data ditemukan",
                paginate: {
                    previous: "Sebelumnya",
                    next:     "Berikutnya"
                }
            }
        });
    }
});
</script>

</body>
</html>