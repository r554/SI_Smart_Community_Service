<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://fanlika.my.id/" target="_blank">DeraOfficial</a> 2021</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= base_url('assets/admin/'); ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/deznav-init.js"></script>

<!-- Counter Up -->
<script src="<?= base_url('assets/admin/'); ?>vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url('assets/admin/'); ?>vendor/apexchart/apexchart.js"></script>

<!-- Chart piety plugin files -->
<script src="<?= base_url('assets/admin/'); ?>vendor/peity/jquery.peity.min.js"></script>

<!-- Dashboard 1 -->
<script src="<?= base_url('assets/admin/'); ?>js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url('assets/admin/'); ?>vendor/owl-carousel/owl.carousel.js"></script>

<!-- Datatable -->
<script src="<?= base_url('assets/admin/'); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/datatables.init.js"></script>

<!-- Jquery Validation -->
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Form validate init -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/jquery.validate-init.js"></script>

<!-- Sweetalert -->
<!-- <script src="<?= base_url('assets/admin/'); ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/sweetalert.init.js"></script> -->

<!-- <script src="<?= base_url(); ?>assets/sweetalert/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert/js/bootstrap.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script> -->

<script>
    $("#confirm").click(function() {
        Swal.fire({
            title: 'Data akan dihapus?',
            text: "Pastikan Anda Memvalidasi data yang akan anda hapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lanjutkan '
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Hapus',
                    'Data Berhasil Dihapus.',
                    'success'
                )
            }
        })
    });
</script>


<!-- momment js is must -->
<script src="<?= base_url('assets/admin/'); ?>vendor/moment/moment.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="<?= base_url('assets/admin/'); ?>vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- pickdate -->
<script src="<?= base_url('assets/admin/'); ?>vendor/pickadate/picker.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/pickadate/picker.time.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/pickadate/picker.date.js"></script>



<!-- Daterangepicker -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/pickadate-init.js"></script>
</body>

</html>