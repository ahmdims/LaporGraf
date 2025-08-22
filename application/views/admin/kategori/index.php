<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Setup Master Kategori</h6>
        <a href="<?= site_url('admin/kategori/create'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
            Tambah Kategori</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Unit Penanggung Jawab (Petugas)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori_list as $k): ?>
                        <tr>
                            <td><?= $k->id_kategori; ?></td>
                            <td><?= htmlspecialchars($k->nama_kategori); ?></td>
                            <td><span class="badge badge-info"><?= htmlspecialchars($k->petugas); ?></span></td>
                            <td>
                                <a href="<?= site_url('admin/kategori/edit/' . $k->id_kategori); ?>"
                                    class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="<?= site_url('admin/kategori/delete/' . $k->id_kategori); ?>"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Yakin?');"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>