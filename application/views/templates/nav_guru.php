<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
    <div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
        <a href="<?= site_url('guru/dashboard'); ?>">
            <img alt="Logo" src="<?= base_url('asset/media/logos/default.svg'); ?>"
                class="h-20px h-lg-30px theme-light-show" />
            <img alt="Logo" src="<?= base_url('asset/media/logos/default-dark.svg'); ?>"
                class="h-20px h-lg-30px theme-dark-show" />
        </a>
    </div>
    <div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
        <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4" data-kt-scroll="true"
            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">

            <div class="mb-6">
                <h3 class="text-gray-800 fw-bold mb-8">Menu Utama</h3>
                <div class="row row-cols-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                    <div class="col mb-4">
                        <a href="<?= site_url('guru/dashboard'); ?>"
                            class="<?= ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?> btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200"
                            data-kt-button="true">
                            <span class="mb-2">
                                <i class="ki-outline ki-home-2 fs-1"></i>
                            </span>
                            <span class="fs-7 fw-bold">Beranda</span>
                        </a>
                    </div>
                </div>

                <h3 class="text-gray-800 fw-bold mt-8 mb-8">Aktivitas</h3>
                <div class="row row-cols-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                    <div class="col mb-4">
                        <a href="<?= site_url('guru/pengaduan/create'); ?>"
                            class="<?= ($this->uri->segment(2) == 'pengaduan' && $this->uri->segment(3) == 'create') ? 'active' : ''; ?> btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200"
                            data-kt-button="true">
                            <span class="mb-2">
                                <i class="ki-outline ki-message-text fs-1"></i>
                            </span>
                            <span class="fs-7 fw-bold">Lapor</span>
                        </a>
                    </div>

                    <div class="col mb-4">
                        <a href="<?= site_url('guru/pengaduan'); ?>"
                            class="<?= ($this->uri->segment(2) == 'pengaduan' && $this->uri->segment(3) == '') ? 'active' : ''; ?> btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200"
                            data-kt-button="true">
                            <span class="mb-2">
                                <i class="ki-outline ki-calendar fs-1"></i>
                            </span>
                            <span class="fs-7 fw-bold">Histori Lapor</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>