<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan untuk Unit Anda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Pelapor</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengaduan_list as $p): ?>
                        <tr>
                            <td><?= date('d-m-Y', strtotime($p->date)); ?></td>
                            <td><?= htmlspecialchars($p->judul); ?></td>
                            <td><?= htmlspecialchars($p->nama_kategori); ?></td>
                            <td><?= htmlspecialchars($p->nama_pelapor); ?></td>
                            <td>
                                <?php if ($p->konfirmasi == '1'): ?>
                                    <span class="badge badge-success">Sudah Ditanggapi</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Menunggu Tanggapan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('manajemen/pengaduan/detail/' . $p->id_pengaduan); ?>"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Detail & Tanggapi
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>