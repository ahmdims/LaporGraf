<div class="card shadow">
    <div class="card-header">
        <h4>Tambah Akun Siswa</h4>
    </div>
    <div class="card-body">
        <?= form_open('admin/siswa/store'); ?>
        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close(); ?>
    </div>
</div>