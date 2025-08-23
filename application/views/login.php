<!DOCTYPE html>
<html lang="en">

<head>
    <title>LaporGraf</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?= base_url('asset/media/logos/favicon.svg'); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= base_url('asset/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url('asset/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('asset/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

<?php $this->load->view('templates/flasher'); ?>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('<?= base_url('asset/media/auth/bg10.jpeg'); ?>');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?= base_url('asset/media/auth/bg10-dark.jpeg'); ?>');
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="<?= base_url('asset/media/auth/agency.png'); ?>" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="<?= base_url('asset/media/auth/agency-dark.png'); ?>" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">LaporGraf</h1>
                    <div class="text-gray-600 fs-base text-center fw-semibold">
                        Website untuk mengadukan, memberi saran, dan kritikan di kalangan warga Grafika.
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                            <?= form_open('auth/process_login', ['class' => 'form w-100', 'id' => 'kt_sign_in_form', 'novalidate' => 'novalidate']); ?>

                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Masuk LaporGraf</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Kelola dan pantau laporan dengan mudah</div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="ID Pengguna" name="user_id"
                                    value="<?= set_value('user_id'); ?>" autocomplete="off"
                                    class="form-control bg-transparent" required />
                                <?= form_error('user_id', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="fv-row mb-3" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input type="password" placeholder="Password" name="password" autocomplete="off"
                                            class="form-control bg-transparent" required />
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-outline ki-eye-slash fs-2"></i>
                                            <i class="ki-outline ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="<?= site_url('auth/reset_password'); ?>" class="link-primary">Lupa Password
                                    ?</a>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Masuk</span>
                                </button>
                            </div>

                            <?= form_close(); ?>
                        </div>

                        <div class="d-flex flex-stack">
                            <div class="me-10">
                                <a href="#" target="_blank">Terms</a>
                            </div>
                            <div class="d-flex fw-semibold text-primary fs-base gap-5">
                                <a href="#" target="_blank">Terms</a>
                                <a href="#" target="_blank">Plans</a>
                                <a href="#" target="_blank">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>var hostUrl = "<?= base_url('asset/'); ?>";</script>
    <script src="<?= base_url('asset/plugins/global/plugins.bundle.js'); ?>"></script>
    <script src="<?= base_url('asset/js/scripts.bundle.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom/authentication/sign-in/general.js'); ?>"></script>
</body>

</html>