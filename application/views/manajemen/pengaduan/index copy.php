<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan Masuk untuk Unit Anda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pelapor</th>
                        <th>Tanggal Lapor</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pengaduan_list as $pengaduan): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($pengaduan->judul); ?></td>
                            <td><?= htmlspecialchars($pengaduan->nama_pelapor); ?></td>
                            <td><?= date('d F Y', strtotime($pengaduan->date)); ?></td>
                            <td>
                                <?php if ($pengaduan->jumlah_balasan > 0): ?>
                                    <span class="badge badge-success">Sudah Ditanggapi</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Perlu Tanggapan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('manajemen/pengaduan/detail/' . $pengaduan->id_pengaduan); ?>"
                                    class="btn btn-info btn-sm">Detail & Tanggapi</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>