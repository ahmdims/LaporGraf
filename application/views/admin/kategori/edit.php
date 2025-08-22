<div class="card shadow mb-4">
    <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6></div>
    <div class="card-body">
        <?= form_open('admin/kategori/update/' . $kategori->id_kategori); ?>
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="<?= htmlspecialchars($kategori->nama_kategori); ?>" required>
            </div>
            <div class="form-group">
                <label>Unit Penanggung Jawab (Petugas)</label>
                <select name="petugas" class="form-control" required>
                    <option value="">-- Pilih Unit --</option>
                    <?php foreach($unit_list as $unit): ?>
                        <option value="<?= $unit->keterangan; ?>" <?= ($unit->keterangan == $kategori->petugas) ? 'selected' : ''; ?>>
                            <?= $unit->keterangan; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        <?= form_close(); ?>
    </div>
</div>