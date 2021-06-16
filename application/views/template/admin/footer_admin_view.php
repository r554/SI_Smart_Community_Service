  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      PELAPORAN
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y', time()); ?> <a href="<?= base_url(); ?>">PELAPORAN</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- pace-progress -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/pace-progress/pace.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/adminlte/'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/adminlte/'); ?>dist/js/adminlte.min.js"></script>
  <!-- CHart Js -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <?php if ($menu == 'dasbor') : ?>
    <script>
      $(function() {
        'use strict'

        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = false

        var $visitorsChart = $('#visitors-chart')
        var visitorsChart = new Chart($visitorsChart, {
          data: {
            labels: [
              <?php
              foreach ($visitors_this_week as $row) {
                echo "'" . $row['date'] . "', ";
              }
              ?>
            ],
            datasets: [{
              type: 'line',
              data: [
                <?php
                foreach ($visitors_this_week as $row) {
                  echo $row['visitor_per_day'] . ', ';
                }
                ?>
              ],
              backgroundColor: 'transparent',
              borderColor: '#007bff',
              pointBorderColor: '#007bff',
              pointBackgroundColor: '#007bff',
              fill: false
              // pointHoverBackgroundColor: '#007bff',
              // pointHoverBorderColor    : '#007bff'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                // display: false,              
                scaleLabel: {
                  display: false,
                  labelString: 'Value'
                },
                gridLines: {
                  display: true,
                  lineWidth: '5px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: $.extend({
                  beginAtZero: true,
                  suggestedMax: 10,
                }, ticksStyle)
              }],
              xAxes: [{
                display: true,
                gridLines: {
                  display: true
                },
                ticks: ticksStyle
              }]
            }
          }
        })

        // pie chart
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
          labels: [
            <?php
            foreach ($browsers_users as $row) {
              echo "'" . $row['browser'] . "', ";
            }
            ?>
          ],
          datasets: [{
            data: [
              <?php
              foreach ($browsers_users as $row) {
                echo $row['browser_count'] . ", ";
              }
              ?>
            ],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#bc3cb3', '#bcba3c', '#3cbcb6', '#c4c4c4', '#c4c4c4', '#c4c4c4', '#c4c4c4'],
          }]
        }
        var pieOptions = {
          legend: {
            display: true,
          }
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
          type: 'doughnut',
          data: pieData,
          options: pieOptions
        })
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu == 'tambah_post_baru' || $sub_menu == 'tambah_pengguna' || $sub_menu == 'semua_pengguna' || $sub_menu == 'semua_pemberitahuan' || $sub_menu == 'semua_laporan') : ?>
    <script>
      $(function() {
        // Summernote
        $('#textarea-post').summernote()
        $('.select2').select2()
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu_action == 'get_post' || $sub_menu == 'semua_pengguna' || $sub_menu == 'semua_pemberitahuan' || $sub_menu == 'semua_laporan') : ?>
    <script>
      $(function() {
        // data table
        $('#allPost').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        // handling click button delete
        $('#allPost').on('click', '.action-delete', function(e) {
          href = $(this).attr('href');
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus data?',
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
          }).then((result) => {
            if (result.value) {
              window.location.href = href;
            }
          })
        });
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu_action == 'edit_bayi_balita') : ?>
    <script>
      $(function() {
        // penyakit penyerta lainnya
        $('#penyakit_penyerta').on('change', function() {
          var selected = this.value;
          console.log('penyakit penyerta');

          if (selected == 'Lainnya') {
            $('#penyakit_penyerta_lainnya').attr('disabled', false);
          } else {
            $('#penyakit_penyerta_lainnya').attr('disabled', true);
          }
        })

        var penyakitPenyerta = $('#penyakit_penyerta').children(":selected").val();
        if (penyakitPenyerta == 'Lainnya') {
          $('#penyakit_penyerta_lainnya').attr('disabled', false);
        } else {
          $('#penyakit_penyerta_lainnya').attr('disabled', true);
        }


        // riwayat penyakit lainnya
        $('#riwayat_penyakit').on('change', function() {
          var selected = this.value;

          if (selected == 'Lainnya') {
            $('#riwayat_penyakit_lainnya').attr('disabled', false);
          } else {
            $('#riwayat_penyakit_lainnya').attr('disabled', true);
          }
        })

        var riwayatPenyakit = $('#riwayat_penyakit').children(":selected").val();
        if (riwayatPenyakit == 'Lainnya') {
          $('#riwayat_penyakit_lainnya').attr('disabled', false);
        } else {
          $('#riwayat_penyakit_lainnya').attr('disabled', true);
        }

        // asi eksklusif
        $('#asi_eksklusif').on('change', function() {
          var selected = this.value;

          if (selected == 'YA') {
            $('#lama_asi').attr('disabled', false);
          } else {
            $('#lama_asi').attr('disabled', true);
          }
        })

        var asiEksklusif = $('#asi_eksklusif').children(":selected").val();
        if (asiEksklusif == 'YA') {
          $('#lama_asi').attr('disabled', false);
        } else {
          $('#lama_asi').attr('disabled', true);
        }
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu_action == 'edit_post') : ?>
    <script>
      $(function() {
        // Summernote
        $('#textarea-post').summernote()
        $('.select2').select2()
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu_action == 'get_category') : ?>
    <script>
      $(function() {
        // data table
        $('#allCategory').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        // handling click button delete
        $('#allCategory').on('click', '.action-delete', function(e) {
          href = $(this).attr('href');
          e.preventDefault();

          Swal.fire({
            title: 'Yakin ingin menghapus data?',
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
          }).then((result) => {
            if (result.value) {
              window.location.href = href;
            }
          })
        });

        // handling click button update
        $('#allCategory').on('click', '.action-edit', function(e) {
          e.preventDefault();
          var id_category = $(this).attr('id');
          console.log(id_category);

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_category',
              id_category: id_category,
            },
            success: function(data) {
              $('#modal-edit-body').html(data);
            }
          });
        })
      })
    </script>
  <?php endif ?>

  <?php if ($sub_menu_action == 'get_tag') : ?>
    <script>
      $(function() {
        // data table
        $('#allTag').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        // handling click button delete
        $('#allTag').on('click', '.action-delete', function(e) {
          href = $(this).attr('href');
          e.preventDefault();

          Swal.fire({
            title: 'Yakin ingin menghapus data?',
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
          }).then((result) => {
            if (result.value) {
              window.location.href = href;
            }
          })
        });

        // handling click button update
        $('#allTag').on('click', '.action-edit', function(e) {
          e.preventDefault();
          var id_tag = $(this).attr('id');

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_tag',
              id_tag: id_tag,
            },
            success: function(data) {
              $('#modal-edit-body').html(data);
            }
          });
        })
      })
    </script>
  <?php endif ?>

  <?php if ($sub_menu_action == 'get_stunting') : ?>
    <script>
      $(function() {
        // data table
        $('#allTag').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        // handling click button delete
        $('#allTag').on('click', '.action-delete', function(e) {
          href = $(this).attr('href');
          e.preventDefault();

          Swal.fire({
            title: 'Yakin ingin menghapus data?',
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
          }).then((result) => {
            if (result.value) {
              window.location.href = href;
            }
          })
        });

        // handling click button update
        $('#allTag').on('click', '.action-edit', function(e) {
          e.preventDefault();
          var id_stunting = $(this).attr('id');

          $.ajax({
            url: "<?= base_url('admin/ajax'); ?>",
            method: "post",
            data: {
              ajax_menu: 'edit_stunting',
              id_stunting: id_stunting,
            },
            success: function(data) {
              $('#modal-edit-body').html(data);
            }
          });
        })
      })
    </script>
  <?php endif ?>
  </body>

  </html>