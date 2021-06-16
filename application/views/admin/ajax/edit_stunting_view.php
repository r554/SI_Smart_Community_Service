<form action="<?= base_url('admin/stunting'); ?>" method="post" role="form">
    <input type="hidden" name="id_stunting" value="<?= $stunting['id_stunting']; ?>">
    <div class="form-group">        
        <label for="title">Judul Info Stunting</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan judul info stunting" value="<?= $stunting['title']; ?>" required>        
    </div>
    <div class="form-group">        
        <label for="description">Deskripsi</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10"><?= $stunting['description']; ?></textarea>    
    </div>
    <button type="submit" name="update_stunting" value="true" class="btn btn-block btn-success">Update Stunting</button>
</form>