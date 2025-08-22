<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buat Pengaduan Baru</h6>
    </div>
    <div class="card-body">
        <?= form_open('guru/pengaduan/store'); ?>
        <div class="form-group">
            <label>Judul Pengaduan</label>
            <input type="text" name="judul" class="form-control" value="<?= set_value('judul'); ?>" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat Kejadian</label>
            <input type="text" name="tempat" class="form-control" value="<?= set_value('tempat'); ?>" required>
        </div>
        <div class="form-group">
            <label>Deskripsi Pengaduan</label>
            <textarea name="deskripsi" class="form-control" rows="5" required><?= set_value('deskripsi'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
        <a href="<?= site_url('guru/pengaduan'); ?>" class="btn btn-secondary">Batal</a>
        <?= form_close(); ?>
    </div>
</div>