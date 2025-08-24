<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Ubah Laporan
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= site_url('siswa/dashboard'); ?>"
                                class="text-muted text-hover-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= site_url('siswa/pengaduan'); ?>"
                                class="text-muted text-hover-primary">Data Laporan</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Ubah Laporan</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush py-4">
                    <div class="card-body pt-5">
                        <?= form_open('siswa/pengaduan/update/' . $pengaduan->id_pengaduan); ?>

                        <div class="mb-10 fv-row">
                            <div class="col-12">
                                <label class="required form-label">Judul</label>
                                <input type="text" class="form-control mb-2" name="judul"
                                    value="<?= htmlspecialchars($pengaduan->judul); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-5 fv-row">
                            <div class="col-md-6">
                                <label class="form-label">Tempat</label>
                                <input type="text" class="form-control mb-2" name="tempat"
                                    value="<?= htmlspecialchars($pengaduan->tempat); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="required form-label">Kategori</label>
                                <input type="text" class="form-control mb-2"
                                    value="<?= htmlspecialchars($pengaduan->nama_kategori); ?>" readonly>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="required fs-6 fw-semibold mb-2">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control mb-2" rows="3"
                                placeholder="Masukkan alamat lengkap"><?= htmlspecialchars($pengaduan->deskripsi); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="<?= site_url('siswa/pengaduan'); ?>" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Ubah</span>
                            </button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>