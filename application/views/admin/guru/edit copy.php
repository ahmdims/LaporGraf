<div class="card shadow">
    <div class="card-header">
        <h4>Edit Akun Guru</h4>
    </div>
    <div class="card-body">
        <?= form_open('admin/guru/update/' . $user->user_id); ?>
        <div class="form-group">
            <label>NIP/ID Unik</label>
            <input type="text" class="form-control" value="<?= $user->user_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($user->nama); ?>" required>
        </div>
        <div class="form-group">
            <label>Password Baru (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="L" <?= ($user->jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?= ($user->jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <?= form_close(); ?>
    </div>
</div>