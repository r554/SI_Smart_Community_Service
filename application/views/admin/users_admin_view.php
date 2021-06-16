<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/tambahuser'); ?>">Users</a></li>
                        <li class="breadcrumb-item active">Semua User</li>
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
                            <a href="<?= base_url('admin/users/all'); ?>">Semua (<?= $count_all_users; ?>)</a> |
                            <a href="<?= base_url('admin/users/user'); ?>">User (<?= $count_user; ?>)</a> |
                            <a href="<?= base_url('admin/users/admin'); ?>">Admin (<?= $count_admin; ?>)</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Laporan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Terdaftar</th>
                                        <th>Diubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($users as $user) :
                                    ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= base_url('admin/userprofile/') . $user['id_user']; ?>" class="h6"><?= $user['username']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= base_url('admin/userprofile/') . $user['id_user']; ?>" class="text-small text-danger">Edit</a> |
                                                    <a href="<?= base_url('admin/deleteuser/') . $user['id_user']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php
                                                $id_user_now = $user['id_user'];
                                                $current_user = $this->db->query("SELECT tb_laporan.id_user, COUNT(tb_laporan.id_laporan) AS total_laporan FROM tb_laporan WHERE tb_laporan.id_user = $id_user_now GROUP BY tb_laporan.id_user")->row_array();

                                                echo $current_user['total_laporan'] == null ? '-' : $current_user['total_laporan'];
                                                ?>
                                            </td>
                                            <td class="align-middle"><?= $user['jenis_kelamin'] == null ? '-' : $user['jenis_kelamin']; ?></td>
                                            <td class="align-middle"><?= $user['telepon'] == null ? '-' : $user['telepon']; ?></td>
                                            <td class="align-middle"><?= $user['email'] == null ? '-' : $user['email']; ?></td>
                                            <td class="align-middle text-center"><?= $user['level'] == 1 ? 'ADMIN' : 'USER'; ?></td>
                                            <td class="align-middle"><?= date('d M Y', $user['dibuat_pada']); ?></td>
                                            <td class="align-middle"><?php
                                                                        if ($user['diubah_pada'] == 0) {
                                                                            echo '-';
                                                                        } else {
                                                                            echo date('d M Y', $user['diubah_pada']);
                                                                        }
                                                                        ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Laporan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Terdaftar</th>
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