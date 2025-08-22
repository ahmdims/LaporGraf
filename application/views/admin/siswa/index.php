<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Setup Akun Siswa</h6>
        <a href="<?= site_url('admin/siswa/create'); ?>" class="btn btn-sm btn-primary">Tambah Siswa</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_list as $user): ?>
                    <tr>
                        <td><?= $user->user_id; ?></td>
                        <td><?= htmlspecialchars($user->nama); ?></td>
                        <td><?= ($user->jk == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <td>
                            <a href="<?= site_url('admin/siswa/edit/' . $user->user_id); ?>"
                                class="btn btn-sm btn-info">Edit</a>
                            <a href="<?= site_url('admin/siswa/delete/' . $user->user_id); ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>