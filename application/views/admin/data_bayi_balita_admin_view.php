<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua Data Bayi Balita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/databayibalita'); ?>">Bayi Balita</a></li>
                        <li class="breadcrumb-item active">Data Bayi Balita</li>
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
                            <h3 class="card-title">Daftar Data Bayi Balita</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Usia Bayi</th>
                                        <th>TB Bayi</th>
                                        <th>BB Bayi</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Role</th>
                                        <th>SIGN UP</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_bayi_balita as $bayiBalita) :
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= base_url('admin/editdatabayibalita/') . $bayiBalita['id_bayi_balita']; ?>" class="h6"><?= $bayiBalita['username']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= base_url('admin/editdatabayibalita/') . $bayiBalita['id_bayi_balita']; ?>" class="text-small text-danger">Edit</a> |
                                                    <a href="<?= base_url('admin/deletedatabayibalita/') . $bayiBalita['id_bayi_balita']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <td class="align-middle"><?= $bayiBalita['usia_bayi'] == null ? '-' : $bayiBalita['usia_bayi'] . ' minggu'; ?></td>
                                            <td class="align-middle"><?= $bayiBalita['tb_bayi'] == null ? '-' : $bayiBalita['tb_bayi'] . ' cm'; ?></td>
                                            <td class="align-middle"><?= $bayiBalita['bb_bayi'] == null ? '-' : $bayiBalita['bb_bayi'] . ' gr'; ?></td>
                                            <td class="align-middle"><?= $bayiBalita['jenis_kelamin'] == null ? '-' : $bayiBalita['jenis_kelamin']; ?></td>
                                            <td class="align-middle text-center"><?= $bayiBalita['role'] == 1 ? 'ADMIN' : 'USER'; ?></td>
                                            <td class="align-middle"><?= date('d M Y', $bayiBalita['waktu_dibuat']); ?></td>
                                            <td class="align-middle"><?php
                                                                        if ($bayiBalita['waktu_diupdate'] == 0) {
                                                                            echo '-';
                                                                        } else {
                                                                            echo date('d M Y', $bayiBalita['waktu_diupdate']);
                                                                        }
                                                                        ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Usia Bayi</th>
                                        <th>TB Bayi</th>
                                        <th>BB Bayi</th>
                                        <th>Jenis Kelamin</th>
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