<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua Pemberitahuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/pemberitahuan'); ?>">Pemebritahuan</a></li>
                        <li class="breadcrumb-item active">Semua Pemberitahuan</li>
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
                            <h3 class="card-title">Daftar Data Pemberitahuan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Pengirim</th>
                                        <th>Status</th>
                                        <th>Dibuat</th>
                                        <th>Diubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($all_pemberitahuan as $pemberitahuan) :
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= base_url('admin/editpemberitahuan/') . $pemberitahuan['id_pemberitahuan']; ?>" class="h6"><?= $pemberitahuan['judul']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= base_url('admin/editpemberitahuan/') . $pemberitahuan['id_pemberitahuan']; ?>" class="text-small text-danger">Edit</a> |
                                                    <a href="<?= base_url('admin/deletepemberitahuan/') . $pemberitahuan['id_pemberitahuan']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <td class="align-middle"><?= $pemberitahuan['username'] == null ? '-' : $pemberitahuan['username']; ?></td>
                                            <td class="align-middle"><?= $pemberitahuan['dibaca'] == 2 ? 'Belum Dibaca' : 'Dibaca'; ?></td>
                                            <td class="align-middle"><?= date('d M Y', $pemberitahuan['laporan_dibuat']); ?></td>
                                            <td class="align-middle"><?php
                                                                        if ($pemberitahuan['laporan_diubah'] == 0) {
                                                                            echo '-';
                                                                        } else {
                                                                            echo date('d M Y', $pemberitahuan['laporan_diubah']);
                                                                        }
                                                                        ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Pengirim</th>
                                        <th>Status</th>
                                        <th>Dibuat</th>
                                        <th>Diubah</th>
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