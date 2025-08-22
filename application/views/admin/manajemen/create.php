<div class="card shadow">
    <div class="card-header">
        <h4>Tambah Akun Manajemen</h4>
    </div>
    <div class="card-body">
        <?= form_open('admin/manajemen/store'); ?>
        <div class="form-group">
            <label>Unit (Keterangan)</label>
            <select name="keterangan" class="form-control" required>
                <option value="">-- Pilih Unit --</option>
                <?php foreach ($unit_list as $unit): ?>
                    <option value="<?= $unit->keterangan; ?>"><?= $unit->keterangan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close(); ?>
    </div>
</div>