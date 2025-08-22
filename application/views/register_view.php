<!DOCTYPE html>
<html>

<head>
    <title>Register - LaporGraf</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Register LaporGraf</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?= form_open('auth/process_register'); ?>
                        <div class="form-group">
                            <label for="user_id">User ID (NIS/NIP)</label>
                            <input type="text" name="user_id" class="form-control" required>
                            <?= form_error('user_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="Siswa">Siswa</option>
                                <option value="Guru">Guru</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        <?= form_close(); ?>

                        <p class="text-center mt-3">
                            Sudah punya akun? <a href="<?= site_url('auth'); ?>">Login di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>