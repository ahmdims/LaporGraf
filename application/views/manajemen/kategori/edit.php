<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6>
    </div>
    <div class="card-body">
        <?= form_open('manajemen/kategori/update/' . $kategori->id_kategori); ?>
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                value="<?= htmlspecialchars($kategori->nama_kategori); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <?= form_close(); ?>
    </div>
</div>