<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Tanggapan</h6>
    </div>
    <div class="card-body">
        <?= form_open('manajemen/pengaduan/update_tanggapan/' . $tanggapan->id_balasan); ?>
        <div class="form-group">
            <label for="isi_balasan">Isi Tanggapan</label>
            <textarea name="isi_balasan" id="isi_balasan" class="form-control" rows="6"
                required><?= htmlspecialchars($tanggapan->isi_balasan); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= site_url('manajemen/pengaduan/detail/' . $tanggapan->id_pengaduan); ?>"
            class="btn btn-secondary">Batal</a>
        <?= form_close(); ?>
    </div>
</div>