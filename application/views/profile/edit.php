<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Ubah Profil</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= site_url(($this->session->userdata('role') ?: '') . '/dashboard'); ?>"
                                class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= base_url('profile'); ?>" class="text-muted text-hover-primary">Profil Saya</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Ubah Akun</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Detail Profil</h3>
                        </div>
                    </div>
                    <div class="collapse show">
                        <?= form_open_multipart('profile/edit'); ?>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Jenis berkas yang diizinkan: png, jpg, jpeg.</div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nama" class="form-control form-control-lg"
                                        value="<?= $user['nama_siswa'] ?? $user['nama_guru'] ?? $user['nama_manajemen'] ?? $user['nama'] ?? ''; ?>" />
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="jk" class="form-select form-select-lg" data-control="select2"
                                        data-hide-search="true" required>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="L" <?= (isset($user['jk']) && $user['jk'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="P" <?= (isset($user['jk']) && $user['jk'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Nomor Telepon</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="no_telp" class="form-control form-control-lg"
                                        value="<?= $user['no_telp'] ?? ''; ?>" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Alamat</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea name="alamat" class="form-control mb-2"
                                        rows="3"><?= $user['alamat'] ?? ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <a href="<?= site_url('profile'); ?>" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>

                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Ubah Password</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <?= form_open_multipart('profile/change_password'); ?>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6" data-kt-password-meter="true">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                                    Password Saat Ini
                                </label>

                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="position-relative mb-3">
                                        <input type="password" name="current_password"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan password saat ini">

                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-outline ki-eye-slash fs-2"></i>
                                            <i class="ki-outline ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6" data-kt-password-meter="true">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                                    Password Baru
                                </label>

                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="Masukkan password baru" name="password" autocomplete="off" />

                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-outline ki-eye-slash fs-2"></i>
                                            <i class="ki-outline ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3"
                                        data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>

                                    <div class="text-muted">
                                        Gunakan setidaknya 8 karakter dengan campuran huruf besar, angka, dan
                                        simbol.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6" data-kt-password-meter="true">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                                    Ulangi Password Baru
                                </label>

                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="position-relative mb-3">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Ulangi password baru">

                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-outline ki-eye-slash fs-2"></i>
                                            <i class="ki-outline ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <a href="<?= site_url('profile'); ?>" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>