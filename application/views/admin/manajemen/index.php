<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Setup Akun Manajemen</h6>
        <a href="<?= site_url('admin/manajemen/create'); ?>" class="btn btn-sm btn-primary">Tambah Manajemen</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIP/ID</th>
                    <th>Nama</th>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_list as $user): ?>
                    <tr>
                        <td><?= $user->user_id; ?></td>
                        <td><?= htmlspecialchars($user->nama); ?></td>
                        <td><span class="badge badge-primary"><?= htmlspecialchars($user->keterangan); ?></span></td>
                        <td>
                            <a href="<?= site_url('admin/manajemen/edit/' . $user->user_id); ?>"
                                class="btn btn-sm btn-info">Edit</a>
                            <a href="<?= site_url('admin/manajemen/delete/' . $user->user_id); ?>"
                                class="btn btn-sm btn-danger" onclick="return confirm('Yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>