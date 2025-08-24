<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Import Siswa
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
                        <li class="breadcrumb-item text-muted">Import Siswa</li>
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

                        <?= form_open_multipart('admin/siswa/upload'); ?>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Pilih File Excel</label>
                            <input type="file" name="import_file" class="form-control mb-2" required />
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="<?= site_url('admin/siswa'); ?>" class="btn btn-light me-2">Batal</a>
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