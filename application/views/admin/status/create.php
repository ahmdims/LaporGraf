<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Status Baru</h6>
    </div>
    <div class="card-body">
        <?= form_open('admin/status/store'); ?>
        <div class="form-group">
            <label for="status">Nama Status</label>
            <input type="text" name="status" id="status" class="form-control" placeholder="Contoh: Sedang Diperbaiki"
                required>
        </div>
        <div class="form-group">
            <label for="petugas">Unit Terkait (Petugas)</label>
            <select name="petugas" id="petugas" class="form-control" required>
                <option value="">-- Pilih Unit --</option>
                <?php foreach ($unit_list as $unit): ?>
                    <option value="<?= $unit->keterangan; ?>"><?= $unit->keterangan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Status</button>
        <a href="<?= site_url('admin/status'); ?>" class="btn btn-secondary">Batal</a>
        <?= form_close(); ?>
    </div>
</div>