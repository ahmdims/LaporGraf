<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Import Guru
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
                            <a href="<?= site_url('admin/guru'); ?>" class="text-muted text-hover-primary">Data
                                Guru</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Import Guru</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush py-4">
                    <div class="card-body pt-5">
                        <div class="alert alert-info">
                            <strong>Perhatian!</strong> Pastikan file Excel yang Anda unggah memiliki format yang benar.
                            <br>
                            Kolom harus berurutan: <strong>ID, Nama, Password, Jenis Kelamin (L/P), No Telepon,
                                Alamat</strong>. <br>
                            Baris pertama (header) akan dilewati.
                        </div>

                        <?= form_open_multipart('admin/guru/upload'); ?>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Upload Excel</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="excel_file" name="excel_file"
                                    accept=".xlsx,.xls" required>
                                <a href="<?= base_url('asset/docs/guru.xlsx'); ?>" class="btn btn-light-success" download>
                                    <i class="ki-outline ki-exit-down fs-2"></i> Download Template
                                </a>
                            </div>
                            <span class="form-text text-muted">Hanya file dengan ekstensi <code>.xls</code> atau
                                <code>.xlsx</code> yang diperbolehkan.</span>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="<?= site_url('admin/guru'); ?>" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Import</span>
                            </button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>