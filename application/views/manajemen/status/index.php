<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Status untuk Unit Anda</h6>
        <a href="<?= site_url('manajemen/status/create'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
            Tambah Status</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($status_list as $s): ?>
                        <tr>
                            <td><?= $s->id_status; ?></td>
                            <td><?= htmlspecialchars($s->status); ?></td>
                            <td>
                                <a href="<?= site_url('manajemen/status/edit/' . $s->id_status); ?>"
                                    class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <a href="<?= site_url('manajemen/status/delete/' . $s->id_status); ?>"
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