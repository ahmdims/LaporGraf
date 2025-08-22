<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Status Baru</h6>
    </div>
    <div class="card-body">
        <?= form_open('manajemen/status/store'); ?>
        <div class="form-group">
            <label>Nama Status</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close(); ?>
    </div>
</div>