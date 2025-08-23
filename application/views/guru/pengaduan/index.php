<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= site_url('guru/pengaduan/create'); ?>" class="btn btn-primary">Buat Pengaduan Baru</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
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
                            <td><?= htmlspecialchars($pengaduan->nama_kategori); ?></td>
                            <td><?= date('d F Y', strtotime($pengaduan->date)); ?></td>
                            <td>
                                <?php if ($pengaduan->jumlah_balasan > 0): ?>
                                    <span class="badge badge-success">Sudah Ditanggapi</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">Menunggu Tanggapan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('guru/pengaduan/detail/' . $pengaduan->id_pengaduan); ?>"
                                    class="btn btn-info btn-sm">Detail</a>
                                <?php if ($pengaduan->jumlah_balasan == 0): ?>
                                    <a href="<?= site_url('guru/pengaduan/edit/' . $pengaduan->id_pengaduan); ?>"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= site_url('guru/pengaduan/delete/' . $pengaduan->id_pengaduan); ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>