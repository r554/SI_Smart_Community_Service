<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua Data Masa Kehamilan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/datakehamilan'); ?>">Kehamilan</a></li>
                        <li class="breadcrumb-item active">Data Masa Kehamilan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Data Masa Kehamilan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Usia Kehamilan</th>
                                        <th>Jarak Persalinan</th>
                                        <th>Riwayat Penyakit</th>
                                        <th>Role</th>
                                        <th>SIGN UP</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_kehamilan as $kehamilan) :
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= base_url('admin/editdatakehamilan/') . $kehamilan['id_riwayat_hamil']; ?>" class="h6"><?= $kehamilan['username']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= base_url('admin/editdatakehamilan/') . $kehamilan['id_riwayat_hamil']; ?>" class="text-small text-danger">Edit</a> |
                                                    <a href="<?= base_url('admin/deletedatakehamilan/') . $kehamilan['id_riwayat_hamil']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <td class="align-middle"><?= $kehamilan['usia_kehamilan'] == null ? '-' : $kehamilan['usia_kehamilan'] . ' minggu'; ?></td>
                                            <td class="align-middle"><?= $kehamilan['jarak_persalinan'] == null ? '-' : $kehamilan['jarak_persalinan'] . ' tahun'; ?></td>
                                            <td class="align-middle"><?= $kehamilan['riwayat_penyakit_user'] == null ? '-' : $kehamilan['riwayat_penyakit_user']; ?></td>
                                            <td class="align-middle text-center"><?= $kehamilan['role'] == 1 ? 'ADMIN' : 'USER'; ?></td>
                                            <td class="align-middle"><?= date('d M Y', $kehamilan['waktu_dibuat']); ?></td>
                                            <td class="align-middle"><?php
                                                                        if ($kehamilan['waktu_diupdate'] == 0) {
                                                                            echo '-';
                                                                        } else {
                                                                            echo date('d M Y', $kehamilan['waktu_diupdate']);
                                                                        }
                                                                        ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Usia Kehamilan</th>
                                        <th>Jarak Persalinan</th>
                                        <th>Riwayat Penyakit</th>
                                        <th>Role</th>
                                        <th>SIGN UP</th>
                                        <th>Update</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->