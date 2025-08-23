<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Status
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
                            <a href="<?= site_url('admin/status'); ?>" class="text-muted text-hover-primary">Data
                                Status</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Tambah Status</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush py-4">
                    <div class="card-body pt-5">
                        <?= form_open('admin/status/store'); ?>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Status</label>
                            <input type="text" name="status" class="form-control mb-2"
                                placeholder="Status" required />
                            <div class="text-muted fs-7">Status wajib diisi dan disarankan unik.</div>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Unit Terkait (Petugas)</label>
                            <select name="petugas" aria-label="Pilih Unit" data-control="select2"
                                data-placeholder="Pilih Unit" class="form-select" required>
                                <option value="">Pilih Unit</option>
                                <?php foreach ($unit_list as $unit): ?>
                                    <option value="<?= $unit->keterangan; ?>"><?= $unit->keterangan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="<?= site_url('admin/status'); ?>" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>

                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>