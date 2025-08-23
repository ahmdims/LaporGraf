<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Ubah Siswa
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= site_url('admin/dashboard'); ?>"
                                class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= site_url('admin/siswa'); ?>" class="text-muted text-hover-primary">Data
                                Siswa</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Edit Siswa</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush py-4">
                    <div class="card-body pt-5">
                        <?= form_open('admin/siswa/update/' . $user->user_id); ?>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">ID</label>
                            <input type="text" class="form-control mb-2" value="<?= $user->user_id; ?>" readonly />
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control mb-2"
                                value="<?= htmlspecialchars($user->nama); ?>" required />
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control mb-2"
                                placeholder="Kosongkan jika tidak diubah" />
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Jenis Kelamin</label>
                            <select name="jk" class="form-select" data-control="select2" data-hide-search="true"
                                required>
                                <option value="L" <?= ($user->jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="P" <?= ($user->jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control mb-2"
                                value="<?= htmlspecialchars($user->no_telp); ?>" />
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control mb-2" rows="3"
                                placeholder="Masukkan alamat lengkap"><?= htmlspecialchars($user->alamat); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="<?= site_url('admin/siswa'); ?>" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Update</span>
                            </button>
                        </div>

                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>