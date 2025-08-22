<h1 class="h3 mb-4 text-gray-800">Detail Pengaduan</h1>

<div class="row">
    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Pengaduan</h6>
            </div>
            <div class="card-body">
                <h5><?= htmlspecialchars($pengaduan->judul); ?></h5>
                <hr>
                <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($pengaduan->date)); ?></p>
                <p><strong>Kategori:</strong> <?= htmlspecialchars($pengaduan->nama_kategori); ?></p>
                <p><strong>Pelapor:</strong> <?= htmlspecialchars($pengaduan->nama_pelapor); ?></p>
                <p><strong>Lokasi:</strong> <?= htmlspecialchars($pengaduan->tempat); ?></p>
                <hr>
                <strong>Deskripsi:</strong>
                <p><?= nl2br(htmlspecialchars($pengaduan->deskripsi)); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tanggapan</h6>
            </div>
            <div class="card-body">
                <?php if (empty($pengaduan->balasan)): ?>
                    <p class="text-center">Belum ada tanggapan.</p>
                <?php else: ?>
                    <?php foreach ($pengaduan->balasan as $b): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p><?= nl2br(htmlspecialchars($b->isi_balasan)); ?></p>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                <small>Ditanggapi pada: <?= date('d M Y', strtotime($b->date)); ?></small>
                                <div>
                                    <a href="<?= site_url('manajemen/pengaduan/edit_tanggapan/' . $b->id_balasan); ?>"
                                        class="btn btn-sm btn-info" title="Edit Tanggapan">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= site_url('manajemen/pengaduan/hapus_tanggapan/' . $b->id_balasan); ?>"
                                        class="btn btn-sm btn-danger" title="Hapus Tanggapan"
                                        onclick="return confirm('Yakin ingin menghapus tanggapan ini?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($pengaduan->konfirmasi == '0'): ?>
                    <hr>
                    <h5>Beri Tanggapan Baru</h5>
                    <?= form_open('manajemen/pengaduan/beri_tanggapan/' . $pengaduan->id_pengaduan); ?>
                    <input type="hidden" name="id_kategori" value="<?= $pengaduan->id_kategori; ?>">
                    <div class="form-group">
                        <textarea name="isi_balasan" class="form-control" rows="5"
                            placeholder="Tuliskan tanggapan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim Tanggapan</button>
                    <?= form_close(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<a href="<?= site_url('manajemen/pengaduan'); ?>" class="btn btn-secondary mb-4">&larr; Kembali ke Daftar Pengaduan</a>