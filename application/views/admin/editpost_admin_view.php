<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Informasi Kesehatan</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/allpost'); ?>">Semua Post</a></li>
                        <li class="breadcrumb-item active"><?= $post['title']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <form action="" method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="id_post" value="<?= $post['id_post']; ?>">
        <!-- Main content -->
        <section class="content m-3 mt-0">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Informasi Kesehatan
                            </h3>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="form-group">
                                    <label for="inputJudul">Judul Post</label>
                                    <input type="text" name="title" class="form-control" id="inputJudul" placeholder="Masukkan Judul" value="<?= $post['title']; ?>" required>
                                    <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="textarea-post">Konten Body</label>
                                    <textarea id="textarea-post" class="textarea" name="body" placeholder="Tulis konten informasi kesehatan disini..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $post['body']; ?></textarea>
                                    <?php echo form_error('body', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->

                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Keterangan
                            </h3>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body pad">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control select2" name="category" id="kategori" style="width: 100%;" required>                                            
                                            <?php foreach ($categories as $category) : ?>
                                                <?php if ($category['category'] == $post['category']) : ?>
                                                    <option selected><?= $category['category']; ?></option>
                                                <?php else : ?>
                                                    <option><?= $category['category']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>                                            
                                        </select>
                                        <?php echo form_error('category', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <select class="select2" id="tags" name="tags[]" multiple="multiple" data-placeholder="Pilih tags" style="width: 100%;" required>
                                            <?php
                                            $arr_tags = explode(',', $post['tags']);

                                            foreach ($tags as $tag) {
                                                $value = $tag['tag'];
                                                if (in_array($value, $arr_tags)) {
                                                    echo "<option selected>$value</option>";
                                                } else {
                                                    echo "<option>$value</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('tags[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Post Thumbnail</label>
                                <p class="text-sm text-info">biarkan kosong jika tidak ingin merubah thumbnail</p>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumb" class="custom-file-input" value="null" id="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                                    </div>
                                </div>
                                <?php echo form_error('thumb', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <button type="submit" name="save" value="false" class="btn btn-block btn-info"><i class="fas fa-save mr-1"></i>Save</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="publish" value="true" class="btn btn-block btn-success"><i class="fa fa-paper-plane mr-1"></i>Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- col-md4 -->
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </form>
</div>
<!-- /.content-wrapper -->