<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Tanggapan</h6>
    </div>
    <div class="card-body">
        <?= form_open('manajemen/pengaduan/update_tanggapan/' . $tanggapan->id_balasan); ?>

        <div class="form-group">
            <label for="status">Status Tanggapan</label>
            <select name="id_status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <?php foreach ($status_list as $status): ?>
                    <option value="<?= $status->id_status; ?>" <?= ($status->id_status == $tanggapan->id_status) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($status->status); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

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