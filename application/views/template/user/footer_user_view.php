  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Stunting Early Prevention Application (STEP-A)
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y', time()); ?> <a href="<?= base_url(); ?>">STEP-A</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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

  <?php if ($sub_menu == 'profil') : ?>
    <script>
      $(function() {
        var tglLahirInput = document.getElementById('tanggal_lahir').value;

        var tglLahir = tglLahirInput.split('-');
        tglLahir = new Date(tglLahir[0], tglLahir[1], tglLahir[2]);
        var tglSekarang = new Date();
        var umur = Math.abs(tglLahir - tglSekarang) / 1000;
        umur = Math.floor(umur / (60 * 60 * 24 * 365));

        $('#age').val(umur);

        $('#tanggal_lahir').change(function() {
          var tglLahirInput = document.getElementById('tanggal_lahir').value;

          var tglLahir = tglLahirInput.split('-');
          tglLahir = new Date(tglLahir[0], tglLahir[1], tglLahir[2]);
          var tglSekarang = new Date();
          var umur = Math.abs(tglLahir - tglSekarang) / 1000;
          umur = Math.floor(umur / (60 * 60 * 24 * 365));

          $('#age').val(umur);
        })

        // Summernote
        $('#textarea-post').summernote()
        $('.select2').select2()
        bsCustomFileInput.init()
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu == 'tambah_remaja' || $sub_menu == 'edit_remaja' || $sub_menu == 'tambah_kehamilan' || $sub_menu == 'edit_kehamilan' || $sub_menu == 'tambah_bayi_balita' || $sub_menu == 'edit_bayi_balita') : ?>
    <script>
      $(function() {
        $('.select2').select2()
        bsCustomFileInput.init()

        // penyakit penyerta lainnya
        $('#penyakit_penyerta').on('change', function() {
          var selected = this.value;

          if (selected == 'Lainnya') {
            $('#penyakit_penyerta_lainnya').prop('disabled', false);
          } else {
            $('#penyakit_penyerta_lainnya').prop('disabled', true);
          }
        })

        // riwayat penyakit lainnya
        $('#riwayat_penyakit').on('change', function() {
          var selected = this.value;

          if (selected == 'Lainnya') {
            $('#riwayat_penyakit_lainnya').prop('disabled', false);
          } else {
            $('#riwayat_penyakit_lainnya').prop('disabled', true);
          }
        })

        // asi eksklusif
        $('#asi_eksklusif').on('change', function() {
          var selected = this.value;

          if (selected == 'YA') {
            $('#lama_asi').prop('disabled', false);
          } else {
            $('#lama_asi').prop('disabled', true);
          }
        })
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu == 'edit_bayi_balita') : ?>
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

  <?php if ($sub_menu == 'riwayat_remaja') : ?>
    <script>
      $(function() {
        $('.select2').select2()
        bsCustomFileInput.init()        
      })
    </script>
  <?php endif; ?>

  <?php if ($sub_menu == 'semua_remaja' || $sub_menu == 'semua_kehamilan' || $sub_menu == 'semua_bayi_balita') : ?>
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

        $('#deleteDetail').on('click', function(e) {
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
  </body>

  </html>