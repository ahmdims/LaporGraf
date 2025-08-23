<h1 class="h3 mb-4 text-gray-800">Detail Pengaduan</h1>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>


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
                <div class="card-body">
                    <?php if (empty($balasan_list)): ?>
                        <p class="text-center">Belum ada tanggapan untuk pengaduan ini.</p>
                    <?php else: ?>
                        <?php foreach ($balasan_list as $balas): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <span class="badge badge-info mb-2"><?= htmlspecialchars($balas->status); ?></span>
                                    <p class="card-text"><?= nl2br(htmlspecialchars($balas->isi_balasan)); ?></p>

                                    <?php if ($balas->konfirmasi == '0'): ?>
                                        <a href="<?= site_url('manajemen/pengaduan/edit_tanggapan/' . $balas->id_balasan); ?>"
                                            class="btn btn-sm btn-warning">Ubah</a>
                                        <a href="<?= site_url('manajemen/pengaduan/hapus_tanggapan/' . $balas->id_balasan); ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus tanggapan ini?');">Hapus</a>
                                    <?php else: ?>
                                        <p class="text-sm text-muted mt-2">Tanggapan tidak dapat diubah atau dihapus karena pelapor
                                            sudah memberikan penilaian kepuasan.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ($pengaduan->konfirmasi == '0'): ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Beri Tanggapan</h6>
                            </div>
                            <div class="card-body">
                                <?php if ($pengaduan->konfirmasi == '1' && !empty($pengaduan->balasan)): ?>
                                    <p class="text-success">Anda sudah memberikan tanggapan untuk pengaduan ini.</p>
                                <?php else: ?>
                                    <?= form_open('manajemen/pengaduan/beri_tanggapan/' . $pengaduan->id_pengaduan); ?>
                                    <input type="hidden" name="id_kategori" value="<?= $pengaduan->id_kategori; ?>">
                                    <div class="form-group">
                                        <label>Isi Tanggapan</label>
                                        <textarea name="isi_balasan" class="form-control" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Ubah Status</label>
                                        <select name="id_status" class="form-control" required>
                                            <option value="">-- Pilih Status --</option>
                                            <?php foreach ($status_list as $status): ?>
                                                <option value="<?= $status->id_status; ?>"><?= htmlspecialchars($status->status); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                                    <?= form_close(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <a href="<?= site_url('manajemen/pengaduan'); ?>" class="btn btn-secondary mb-4">&larr; Kembali ke Daftar
        Pengaduan</a>