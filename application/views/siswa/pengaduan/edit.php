<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Pengaduan</h6>
    </div>
    <div class="card-body">
        <?= form_open('siswa/pengaduan/update/' . $pengaduan->id_pengaduan); ?>
        <div class="form-group">
            <label>Judul Pengaduan</label>
            <input type="text" name="judul" class="form-control" value="<?= set_value('judul', $pengaduan->judul); ?>"
                required>
            <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" class="form-control"
                value="<?= htmlspecialchars($this->Kategori_model->get_by_id($pengaduan->id_kategori)->nama_kategori); ?>"
                readonly>
        </div>
        <div class="form-group">
            <label>Deskripsi Pengaduan</label>
            <textarea name="deskripsi" class="form-control" rows="5"
                required><?= set_value('deskripsi', $pengaduan->deskripsi); ?></textarea>
            <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= site_url('siswa/pengaduan'); ?>" class="btn btn-secondary">Batal</a>
        <?= form_close(); ?>
    </div>
</div>