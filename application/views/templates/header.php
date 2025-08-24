<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?> - LaporGraf</title>
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

<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate-="true"
                data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between"
                        id="kt_app_header_wrapper">
                        <div class="app-header-menu align-items-start align-items-lg-center w-100 d-none d-lg-flex">

                            <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-arrow-gray-400 menu-bullet-gray-400 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_header_menu">

                                <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <div id="kt_header_search"
                                        class="header-search d-flex align-items-center w-lg-350px">
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">
                                            <i class="ki-outline ki-profile-circle text-primary me-2 fs-3"></i>
                                            <?= ucwords($this->session->userdata('role')); ?>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none"
                                id="kt_app_sidebar_toggle">
                                <i class="ki-outline ki-abstract-14 fs-2"></i>
                            </div>
                            <a href="#" class="d-flex d-lg-none">
                                <img alt="Logo" src="<?= base_url('asset/media/logos/default.svg'); ?>"
                                    class="h-20px theme-light-show" />
                                <img alt="Logo" src="<?= base_url('asset/media/logos/default-dark.svg'); ?>"
                                    class="h-20px theme-dark-show" />
                            </a>
                        </div>
                        <div class="app-navbar flex-shrink-0">
                            <div class="app-navbar-item ms-1 ms-lg-3">
                                <div class="ms-3">
                                    <div class="cursor-pointer position-relative symbol symbol-circle symbol-40px"
                                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        <img src="<?= base_url(!empty($this->session->userdata('foto_profil')) ? 'uploads/' . $this->session->userdata('foto_profil') : 'asset/media/avatars/null.png'); ?>"
                                            alt="<?= $this->session->userdata('nama'); ?>">
                                    </div>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <div class="symbol symbol-50px me-5">
                                                    <img src="<?= base_url(!empty($this->session->userdata('foto_profil')) ? 'uploads/' . $this->session->userdata('foto_profil') : 'asset/media/avatars/null.png'); ?>"
                                                        alt="<?= $this->session->userdata('nama'); ?>">
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        <?= $this->session->userdata('nama'); ?>
                                                        <span
                                                            class="badge badge-light-primary fw-bold fs-8 px-2 py-1 ms-2">
                                                            <?= ucwords($this->session->userdata('role')); ?>
                                                        </span>
                                                    </div>
                                                    <span class="fw-semibold text-muted text-hover-primary fs-7">
                                                        <?= $this->session->userdata('user_id'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5">
                                            <a href="<?= site_url('profile'); ?>" class="menu-link px-5">
                                                Profil
                                            </a>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5"
                                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                            <a href="#" class="menu-link px-5">
                                                <span class="menu-title position-relative">Mode
                                                    <span
                                                        class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                                        <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                                    </span></span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                                data-kt-menu="true" data-kt-element="theme-mode-menu">
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                        data-kt-value="light">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-night-day fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Terang</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                        data-kt-value="dark">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-moon fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Gelap</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                        data-kt-value="system">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-screen fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Sistem</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-item px-5">
                                            <a href="<?= site_url('auth/logout'); ?>" class="menu-link px-5">
                                                Keluar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <?php
                $role = $this->session->userdata('role');
                if ($role == 'admin') {
                    $this->load->view('templates/nav_admin');
                } elseif ($role == 'manajemen') {
                    $this->load->view('templates/nav_manajemen');
                } elseif ($role == 'guru') {
                    $this->load->view('templates/nav_guru');
                } elseif ($role == 'siswa') {
                    $this->load->view('templates/nav_siswa');
                }
                ?>