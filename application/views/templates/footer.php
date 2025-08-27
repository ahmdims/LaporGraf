<div id="kt_app_footer" class="app-footer">
    <div class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2025&copy;</span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">LaporGraf</a>
        </div>
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>

<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-outline ki-arrow-up"></i>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hapusBtns = document.querySelectorAll('.btn-hapus');

        hapusBtns.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = btn.href;
                    }
                });
            });
        });
    });
</script>

<script>var hostUrl = "<?= base_url('asset/'); ?>";</script>
<script src="<?= base_url('asset/plugins/global/plugins.bundle.js'); ?>"></script>
<script src="<?= base_url('asset/js/scripts.bundle.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/custom/datatables/datatables.bundle.js'); ?>"></script>
<script src="<?= base_url('asset/js/custom/apps/ecommerce/reports/customer-orders/customer-orders.js'); ?>"></script>
<script src="<?= base_url('asset/js/widgets.bundle.js'); ?>"></script>
<script src="<?= base_url('asset/js/custom/widgets.js'); ?>"></script>
<script src="<?= base_url('asset/js/custom/apps/chat/chat.js'); ?>"></script>
<script src="<?= base_url('asset/js/custom/utilities/modals/create-app.js'); ?>"></script>
<script src="<?= base_url('asset/js/custom/utilities/modals/users-search.js'); ?>"></script>

<script src="<?= base_url('asset/js/custom/account/settings/profile-details.js'); ?>"></script>

</body>

</html>