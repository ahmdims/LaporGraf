<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Edit Status</h6>
    </div>
    <div class="card-body">
        <?= form_open('manajemen/status/update/' . $status->id_status); ?>
        <div class="form-group">
            <label>Nama Status</label>
            <input type="text" name="status" class="form-control" value="<?= htmlspecialchars($status->status); ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <?= form_close(); ?>
    </div>
</div>