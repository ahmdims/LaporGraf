<h1 class="h3 mb-4 text-gray-800">Detail Pengaduan</h1>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Pengaduan Anda</h6>
    </div>
    <div class="card-body">
        <h5><?= htmlspecialchars($pengaduan->judul); ?></h5>
        <p><small class="text-muted">Tanggal Lapor: <?= date('d F Y', strtotime($pengaduan->date)); ?></small></p>
        <p><?= nl2br(htmlspecialchars($pengaduan->deskripsi)); ?></p>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tanggapan dari Manajemen</h6>
    </div>
    <div class="card-body">
        <?php if (empty($pengaduan->balasan)): ?>
            <p class="text-center">Belum ada tanggapan untuk pengaduan ini.</p>
        <?php else: ?>
            <?php foreach ($pengaduan->balasan as $balas): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <span class="badge badge-info mb-2"><?= htmlspecialchars($balas->status); ?></span>
                        <p class="card-text"><?= nl2br(htmlspecialchars($balas->isi_balasan)); ?></p>
                    </div>
                    <div class="card-footer">
                        <?php if (isset($balas->kepuasan) && $balas->kepuasan): ?>
                            <h6 class="text-success font-weight-bold">Anda sudah memberi feedback:</h6>
                            <p><strong>Rating: </strong>
                                <?php for ($i = 0; $i < $balas->kepuasan->rating; $i++) {
                                    echo '⭐';
                                } ?>
                            </p>
                            <p><strong>Komentar: </strong> <?= htmlspecialchars($balas->kepuasan->komentar); ?></p>
                        <?php else: ?>
                            <h6 class="text-primary">Beri Feedback untuk Tanggapan Ini:</h6>
                            <?= form_open('guru/pengaduan/beri_kepuasan/' . $balas->id_balasan); ?>
                            <input type="hidden" name="id_pengaduan" value="<?= $pengaduan->id_pengaduan; ?>">
                            <input type="hidden" name="id_kategori" value="<?= $balas->id_kategori; ?>">
                            <div class="form-group">
                                <label>Rating Kepuasan (1-5)</label>
                                <select name="rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5">⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                                    <option value="4">⭐⭐⭐⭐ (Puas)</option>
                                    <option value="3">⭐⭐⭐ (Cukup)</option>
                                    <option value="2">⭐⭐ (Kurang Puas)</option>
                                    <option value="1">⭐ (Tidak Puas)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Komentar Anda</label>
                                <textarea name="komentar" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Kirim Feedback</button>
                            <?= form_close(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<a href="<?= site_url('guru/pengaduan'); ?>" class="btn btn-secondary">&larr; Kembali ke Daftar Pengaduan</a>