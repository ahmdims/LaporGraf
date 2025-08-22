<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan Saya (Guru)</h6>
    </div>
    <div class="card-body">
        <a href="<?= site_url('guru/pengaduan/create'); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i>
            Buat Pengaduan Baru</a>

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

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengaduan_list as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($p->date)); ?></td>
                            <td><?= htmlspecialchars($p->judul); ?></td>
                            <td><?= htmlspecialchars($p->nama_kategori); ?></td>
                            <td>
                                <?php if ($p->konfirmasi == '1'): ?>
                                    <span class="badge badge-success">Sudah Ditanggapi</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Menunggu Tanggapan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($p->konfirmasi == '0'): ?>
                                    <a href="<?= site_url('guru/pengaduan/detail/' . $p->id_pengaduan); ?>"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= site_url('guru/pengaduan/edit/' . $p->id_pengaduan); ?>"
                                        class="btn btn-sm btn-info" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= site_url('guru/pengaduan/delete/' . $p->id_pengaduan); ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus pengaduan ini?');" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= site_url('guru/pengaduan/detail/' . $p->id_pengaduan); ?>"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Lihat Detail
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>