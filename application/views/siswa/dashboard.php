<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Hai, <?= $this->session->userdata('nama'); ?>!</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= site_url('siswa/dashboard'); ?>"
                                class="text-muted text-hover-primary">Beranda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-4 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                                style="background-image: url('<?= base_url('asset/media/svg/shapes/top-green.png'); ?>');"
                                data-bs-theme="light">
                                <h3 class="card-title align-items-start flex-column text-white pt-15">
                                    <span class="fw-bold fs-2x mb-3">My Tasks</span>
                                    <div class="fs-4 text-white">
                                        <span class="opacity-75">You have</span>
                                        <span class="position-relative d-inline-block">
                                            <a href="../../demo23/dist/pages/user-profile/projects.html"
                                                class="link-white opacity-75-hover fw-bold d-block mb-1">4 tasks</a>
                                            <span
                                                class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                        </span>
                                        <span class="opacity-75">to comlete</span>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body mt-n20">
                                <div class="mt-n20 position-relative">
                                    <div class="row g-3 g-lg-6">
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-message-text fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?= $pengaduan_saya; ?></span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Laporan Saya</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-timer fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?= $pengaduan_diproses; ?></span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Menunggu
                                                        Konfirmasi</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1"><?= $pengaduan_selesai; ?></span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Laporan Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                                <div class="symbol symbol-30px me-5 mb-8">
                                                    <span class="symbol-label">
                                                        <i class="ki-outline ki-timer fs-1 text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">822</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Hours Learned</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 mb-5 mb-xl-10">
                        <div class="row g-5 g-xl-10">
                            <div class="col-xl-6 mb-xl-10">
                                <div id="kt_sliders_widget_1_slider"
                                    class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
                                    data-bs-ride="carousel" data-bs-interval="5000">
                                    <div class="card-header pt-5">
                                        <h4 class="card-title d-flex align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Today’s Course</span>
                                            <span class="text-gray-400 mt-1 fw-bold fs-7">4 lessons, 3 hours 45
                                                minutes</span>
                                        </h4>
                                    </div>
                                    <div class="card-body py-6">
                                        <div class="carousel-inner mt-n5">
                                            <div class="carousel-item active show">
                                                <div class="d-flex align-items-center mb-5">
                                                    <div class="w-80px flex-shrink-0 me-2">
                                                        <div class="min-h-auto ms-n3" id="kt_slider_widget_1_chart_1"
                                                            style="height: 100px"></div>
                                                    </div>
                                                    <div class="m-0">
                                                        <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                        <div class="d-flex d-grid gap-5">
                                                            <div class="d-flex flex-column flex-shrink-0 me-4">
                                                                <span
                                                                    class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                                    <i
                                                                        class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>3
                                                                    Topics</span>
                                                                <span
                                                                    class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                                    <i
                                                                        class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                    Speakers</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-0">
                                                    <a href="#" class="btn btn-sm btn-light me-2 mb-2">Skip This</a>
                                                    <a href="#" class="btn btn-sm btn-primary mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_create_app">Continue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-5 mb-xl-10">
                                <div id="kt_sliders_widget_2_slider"
                                    class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
                                    data-bs-ride="carousel" data-bs-interval="5500">
                                    <div class="card-header pt-5">
                                        <h4 class="card-title d-flex align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Today’s Events</span>
                                            <span class="text-gray-400 mt-1 fw-bold fs-7">24 events on all
                                                activities</span>
                                        </h4>
                                    </div>
                                    <div class="card-body py-6">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active show">
                                                <div class="d-flex align-items-center mb-9">
                                                    <div class="symbol symbol-70px symbol-circle me-5">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="ki-outline ki-abstract-24 fs-3x text-success"></i>
                                                        </span>
                                                    </div>
                                                    <div class="m-0">
                                                        <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                        <div class="d-flex d-grid gap-5">
                                                            <div class="d-flex flex-column flex-shrink-0 me-4">
                                                                <span
                                                                    class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                                    <i
                                                                        class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>5
                                                                    Topics</span>
                                                                <span
                                                                    class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                                    <i
                                                                        class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                    Speakers</span>
                                                            </div>
                                                            <div class="d-flex flex-column flex-shrink-0">
                                                                <span
                                                                    class="d-flex align-items-center fs-7 fw-bold text-gray-400 mb-2">
                                                                    <i
                                                                        class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>60
                                                                    Min</span>
                                                                <span
                                                                    class="d-flex align-items-center text-gray-400 fw-bold fs-7">
                                                                    <i
                                                                        class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>137
                                                                    students</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-0">
                                                    <a href="#" class="btn btn-sm btn-light me-2 mb-2">Details</a>
                                                    <a href="#" class="btn btn-sm btn-success mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_create_campaign">Join Event</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-transparent" data-bs-theme="light" style="background-color: #1C325E;">
                            <div class="card-body d-flex ps-xl-15 position-relative">
                                <div class="m-0">
                                    <div class="fs-2x z-index-2 fw-bold text-white mb-7">
                                        <span>Bingung atau menemukan masalah?</span>
                                        <br />
                                        <span class="text-warning">Laporkan sekarang di LaporGraf!</span>
                                    </div>
                                    <div class="mb-3">
                                        <a href="<?= site_url('siswa/pengaduan/create'); ?>"
                                            class="btn btn-warning fw-semibold me-2">
                                            Buat Laporan
                                        </a>
                                    </div>
                                </div>
                                <img src="<?= base_url('asset/media/illustrations/sigma-1/17-dark.png'); ?>"
                                    class="position-absolute me-3 bottom-0 end-0 h-200px" alt="Ilustrasi laporan" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>