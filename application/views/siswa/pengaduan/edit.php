<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Pengaduan</h6>
    </div>
    <div class="card-body">
        <?= form_open('siswa/pengaduan/update/' . $pengaduan->id_pengaduan); ?>
        <div class="form-group">
            <label>Judul Pengaduan</label>
            <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($pengaduan->judul); ?>"
                required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($pengaduan->nama_kategori); ?>"
                readonly>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5"
                required><?= htmlspecialchars($pengaduan->deskripsi); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Pengaduan</button>
        <a href="<?= site_url('siswa/pengaduan'); ?>" class="btn btn-secondary">Batal</a>
        <?= form_close(); ?>
    </div>
</div>