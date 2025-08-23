<!DOCTYPE html>

<html lang="en">

<head>
    <base href="<?= base_url('asset/'); ?>" />
    <title><?= $title; ?> - LaporGraf</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?= base_url('asset/media/logos/favicon.ico'); ?>" />

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
                        <div class="app-header-menu app-header-mobile-drawer align-items-start align-items-lg-center w-100"
                            data-kt-drawer="true" data-kt-drawer-name="app-header-menu"
                            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                            data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-arrow-gray-400 menu-bullet-gray-400 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="#kt_header_menu" data-kt-menu="true">

                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start"
                                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <span class="menu-link">
                                        <span class="menu-title">Help</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <div
                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                        <div class="menu-item">
                                            <a class="menu-link"
                                                href="https://preview.keenthemes.com/html/metronic/docs/base/utilities"
                                                target="_blank"
                                                title="Check out over 200 in-house components, plugins and ready for use solutions"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                                data-bs-placement="right">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-rocket fs-2"></i>
                                                </span>
                                                <span class="menu-title">Components</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link"
                                                href="https://preview.keenthemes.com/html/metronic/docs" target="_blank"
                                                title="Check out the complete documentation" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-dismiss="click"
                                                data-bs-placement="right">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-abstract-26 fs-2"></i>
                                                </span>
                                                <span class="menu-title">Documentation</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link"
                                                href="https://preview.keenthemes.com/metronic8/demo23/layout-builder.html"
                                                title="Build your layout and export HTML for server side integration"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                                data-bs-placement="right">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-switch fs-2"></i>
                                                </span>
                                                <span class="menu-title">Layout Builder</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link"
                                                href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog"
                                                target="_blank">
                                                <span class="menu-icon">
                                                    <i class="ki-outline ki-code fs-2"></i>
                                                </span>
                                                <span class="menu-title">Changelog v8.2.0</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none"
                                id="kt_app_sidebar_toggle">
                                <i class="ki-outline ki-abstract-14 fs-2"></i>
                            </div>
                            <a href="../../demo23/dist/index.html" class="d-flex d-lg-none">
                                <img alt="Logo" src="assets/media/logos/demo23.svg" class="h-20px theme-light-show" />
                                <img alt="Logo" src="assets/media/logos/demo23-dark.svg"
                                    class="h-20px theme-dark-show" />
                            </a>
                        </div>
                        <div class="app-navbar flex-shrink-0">
                            <div class="app-navbar-item ms-1 ms-lg-3">
                                <div class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body"
                                    id="kt_drawer_chat_toggle">
                                    <i class="ki-outline ki-message-notif fs-1"></i>
                                </div>
                            </div>
                            <div class="app-navbar-item d-lg-none ms-2 me-n4" title="Show header menu">
                                <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary"
                                    id="kt_app_header_menu_toggle">
                                    <i class="ki-outline ki-text-align-left fs-2 fw-bold"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_toggle">
                    <div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
                        <a href="../../demo23/dist/index.html">
                            <img alt="Logo" src="assets/media/logos/demo23.svg"
                                class="h-20px h-lg-25px theme-light-show" />
                            <img alt="Logo" src="assets/media/logos/demo23-dark.svg"
                                class="h-20px h-lg-25px theme-dark-show" />
                        </a>
                        <div class="ms-3">
                            <div class="cursor-pointer position-relative symbol symbol-circle symbol-40px"
                                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">
                                <img src="assets/media/avatars/300-2.jpg" alt="user" />
                                <div
                                    class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3">
                                </div>
                            </div>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="assets/media/avatars/300-2.jpg" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                                                <span
                                                    class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                            </div>
                                            <a href="#"
                                                class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5">
                                    <a href="../../demo23/dist/account/overview.html" class="menu-link px-5">My
                                        Profile</a>
                                </div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">Mode
                                            <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
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
                                                <span class="menu-title">Light</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-moon fs-2"></i>
                                                </span>
                                                <span class="menu-title">Dark</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="system">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-screen fs-2"></i>
                                                </span>
                                                <span class="menu-title">System</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="../../demo23/dist/authentication/layouts/corporate/sign-in.html"
                                        class="menu-link px-5">Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
                        <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">

                            <div class="mb-6">
                                <h3 class="text-gray-800 fw-bold mb-8">Services</h3>
                                <div class="row row-cols-3" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]">
                                    <div class="col mb-4">
                                        <a href="../../demo23/dist/apps/calendar.html"
                                            class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200"
                                            data-kt-button="true">
                                            <span class="mb-2">
                                                <i class="ki-outline ki-calendar fs-1"></i>
                                            </span>
                                            <span class="fs-7 fw-bold">Events</span>
                                        </a>
                                    </div>
                                    <div class="col mb-4">
                                        <a href="../../demo23/dist/apps/support-center/licenses.html"
                                            class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200"
                                            data-kt-button="true">
                                            <span class="mb-2">
                                                <i class="ki-outline ki-security-check fs-1"></i>
                                            </span>
                                            <span class="fs-7 fw-bold">Insurance</span>
                                        </a>
                                    </div>
                                    <div class="col mb-4">
                                        <a href="../../demo23/dist/apps/contacts/add-contact.html"
                                            class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px active border-primary border-dashed"
                                            data-kt-button="true">
                                            <span class="mb-2">
                                                <i class="ki-outline ki-plus fs-1"></i>
                                            </span>
                                            <span class="fs-7 fw-bold">Add New</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <div class="page-title d-flex flex-column justify-content-center me-3">
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Customer Orders Report
                                    </h1>
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <li class="breadcrumb-item text-muted">
                                            <a href="../../demo23/dist/index.html"
                                                class="text-muted text-hover-primary">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <li class="breadcrumb-item text-muted">eCommerce</li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <li class="breadcrumb-item text-muted">Reports</li>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <div class="m-0">
                                        <a href="#" class="btn btn-sm btn-flex btn-secondary fw-bold"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-outline ki-filter fs-6 text-muted me-1"></i>Filter</a>
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                            data-kt-menu="true" id="kt_menu_64b77af7cf85f">
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                            </div>
                                            <div class="separator border-gray-200"></div>
                                            <div class="px-7 py-5">
                                                <div class="mb-10">
                                                    <label class="form-label fw-semibold">Status:</label>
                                                    <div>
                                                        <select class="form-select form-select-solid"
                                                            multiple="multiple" data-kt-select2="true"
                                                            data-close-on-select="false"
                                                            data-placeholder="Select option"
                                                            data-dropdown-parent="#kt_menu_64b77af7cf85f"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-10">
                                                    <label class="form-label fw-semibold">Member Type:</label>
                                                    <div class="d-flex">
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox" value="1" />
                                                            <span class="form-check-label">Author</span>
                                                        </label>
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                checked="checked" />
                                                            <span class="form-check-label">Customer</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-10">
                                                    <label class="form-label fw-semibold">Notifications:</label>
                                                    <div
                                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="notifications" checked="checked" />
                                                        <label class="form-check-label">Enabled</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                        class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                        data-kt-menu-dismiss="true">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                        data-kt-menu-dismiss="true">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_create_app">Create</a>
                                </div>
                            </div>
                        </div>

                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <div class="card card-flush">
                                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                        <div class="card-title">
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                                <input type="text" data-kt-ecommerce-order-filter="search"
                                                    class="form-control form-control-solid w-250px ps-12"
                                                    placeholder="Search Report" />
                                            </div>
                                            <div id="kt_ecommerce_report_customer_orders_export" class="d-none"></div>
                                        </div>

                                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                            <input class="form-control form-control-solid w-100 mw-250px"
                                                placeholder="Pick date range"
                                                id="kt_ecommerce_report_customer_orders_daterangepicker" />
                                            <div class="w-150px">
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    data-hide-search="true" data-placeholder="Status"
                                                    data-kt-ecommerce-order-filter="status">
                                                    <option></option>
                                                    <option value="all">All</option>
                                                    <option value="active">Active</option>
                                                    <option value="locked">Locked</option>
                                                    <option value="disabled">Disabled</option>
                                                    <option value="banned">Banned</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-outline ki-exit-up fs-2"></i>Export Report</button>
                                            <div id="kt_ecommerce_report_customer_orders_export_menu"
                                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-export="copy">Copy to clipboard</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-export="excel">Export as Excel</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-export="csv">Export as CSV</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-export="pdf">Export as PDF</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_ecommerce_report_customer_orders_table">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-100px">Customer Name</th>
                                                    <th class="min-w-100px">Email</th>
                                                    <th class="min-w-100px">Status</th>
                                                    <th class="min-w-100px">Date Joined</th>
                                                    <th class="text-end min-w-75px">No. Orders</th>
                                                    <th class="text-end min-w-75px">No. Products</th>
                                                    <th class="text-end min-w-100px">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                <tr>
                                                    <td>
                                                        <a href="../../demo23/dist/apps/ecommerce/customers/details.html"
                                                            class="text-dark text-hover-primary">Emma Smith</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">smith@kpmg.com</a>
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-light-success">Active</div>
                                                    </td>
                                                    <td>20 Dec 2023, 9:23 pm</td>
                                                    <td class="text-end pe-0">44</td>
                                                    <td class="text-end pe-0">59</td>
                                                    <td class="text-end">$3289.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="kt_app_footer" class="app-footer">
                        <div
                            class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                <a href="https://keenthemes.com" target="_blank"
                                    class="text-gray-800 text-hover-primary">LaporGraf</a>
                            </div>
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item">
                                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://devs.keenthemes.com" target="_blank"
                                        class="menu-link px-2">Support</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://1.envato.market/EA4JP" target="_blank"
                                        class="menu-link px-2">Purchase</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <script>var hostUrl = "<?= base_url('asset/'); ?>";</script>
    <script src="<?= base_url('asset/plugins/global/plugins.bundle.js'); ?>"></script>
    <script src="<?= base_url('asset/js/scripts.bundle.js'); ?>"></script>
    <script src="<?= base_url('asset/plugins/custom/datatables/datatables.bundle.js'); ?>"></script>
    <script
        src="<?= base_url('asset/js/custom/apps/ecommerce/reports/customer-orders/customer-orders.js'); ?>"></script>
    <script src="<?= base_url('asset/js/widgets.bundle.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom/widgets.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom/apps/chat/chat.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom/utilities/modals/create-app.js'); ?>"></script>
    <script src="<?= base_url('asset/js/custom/utilities/modals/users-search.js'); ?>"></script>

</body>

</html>