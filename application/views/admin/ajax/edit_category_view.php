<form action="<?= base_url('admin/category'); ?>" method="post" role="form">
    <input type="hidden" name="id_category" value="<?= $category['id_category']; ?>">
    <div class="form-group">        
        <input type="text" name="category" class="form-control" id="inputKategori" placeholder="Masukkan Nama Kategori" value="<?= $category['category']; ?>" required>        
    </div>
    <button type="submit" name="update_category" value="true" class="btn btn-block btn-success">Update Category</button>
</form>