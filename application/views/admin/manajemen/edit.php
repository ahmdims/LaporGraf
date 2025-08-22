<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Edit Akun Manajemen</h6>
    </div>
    <div class="card-body">
        <?= form_open('admin/manajemen/update/' . $user->user_id); ?>
        <div class="form-group">
            <label for="user_id">NIP / ID Unik</label>
            <input type="text" id="user_id" class="form-control" value="<?= $user->user_id; ?>" readonly>
            <small class="form-text text-muted">ID tidak dapat diubah.</small>
        </div>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($user->nama); ?>"
                required>
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="form-text text-muted">Kosongkan kolom ini jika Anda tidak ingin mengubah password.</small>
        </div>

        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
                <option value="L" <?= ($user->jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?= ($user->jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Unit (Keterangan)</label>
            <select name="keterangan" id="keterangan" class="form-control" required>
                <option value="">-- Pilih Unit --</option>
                <?php foreach ($unit_list as $unit): ?>
                    <option value="<?= $unit->keterangan; ?>" <?= ($user->keterangan == $unit->keterangan) ? 'selected' : ''; ?>><?= $unit->keterangan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">Update Akun</button>
        <a href="<?= site_url('admin/manajemen'); ?>" class="btn btn-secondary">Batal</a>
        <?= form_close(); ?>
    </div>
</div>