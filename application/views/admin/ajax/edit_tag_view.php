<form action="<?= base_url('admin/tag'); ?>" method="post" role="form">
    <input type="hidden" name="id_tag" value="<?= $tag['id_tag']; ?>">
    <div class="form-group">        
        <input type="text" name="tag" class="form-control" id="inputTag" placeholder="Masukkan Nama Tag" value="<?= $tag['tag']; ?>" required>        
    </div>
    <button type="submit" name="update_tag" value="true" class="btn btn-block btn-success">Update Tag</button>
</form>