<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Informasi Kesehatan</a></li>
                        <li class="breadcrumb-item active">Semua Post</li>
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
                            <a href="<?= base_url('admin/allpost') . '?show=all' ?>">Semua (<?= $total_all_posts; ?>)</a> |
                            <a href="<?= base_url('admin/allpost') . '?show=published' ?>">Terbit (<?= $total_published_posts; ?>)</a> |
                            <a href="<?= base_url('admin/allpost') . '?show=draft' ?>">Draf (<?= $total_draft_posts; ?>)</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= $this->session->flashdata('message'); ?>
                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>                                        
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Tag</th>
                                        <th>Views</th>                                        
                                        <th>Publish</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($posts as $post): 
                                    ?>
                                    <tr>                                        
                                        <td class="align-middle">
                                            <p class="m-0"><a href="<?= base_url('post/') . $post['slug']; ?>" target="_blank" class="h6">
                                            <?php
                                                $status = $post['published'];
                                                if($status == '1'){
                                                    $status = 'Published';
                                                } else {
                                                    $status = 'Draft';
                                                }

                                                echo $post['title'] . ' (' .$status. ')';
                                             ?>
                                             </a></p>
                                            <p class="m-0">
                                                <a href="<?= base_url('admin/editpost/') . $post['id_post']; ?>" class="text-small text-danger">Edit</a> |
                                                <a href="<?= base_url('admin/deletepost/') . $post['id_post']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                            </p>
                                        </td>
                                        <td class="align-middle"><?= $post['email']; ?></td>
                                        <td class="align-middle"><?= $post['category']; ?></td>
                                        <td class="align-middle"><?= $post['tags']; ?></td>
                                        <td class="align-middle text-center"><?= $post['views']; ?></td>                                        
                                        <td class="align-middle"><?= date('d M Y', $post['created_at']); ?></td>
                                        <td class="align-middle"><?php
                                        if($post['updated_at'] == 0){
                                            echo '-';
                                        } else {
                                            echo date('d M Y', $post['updated_at']); 
                                        }
                                        ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>                                        
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Tag</th>
                                        <th>Views</th>                                        
                                        <th>Publish</th>
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