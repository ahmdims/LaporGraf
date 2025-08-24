<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('profile/edit'); ?>
            <div class="mb-3 row">
                <label for="user_id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="user_id" name="user_id"
                        value="<?= $user['user_id']; ?>" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="<?= $user['nama_siswa'] ?? $user['nama_guru'] ?? $user['nama_manajemen'] ?? $user['nama'] ?? ''; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>