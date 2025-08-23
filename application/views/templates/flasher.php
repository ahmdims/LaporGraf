<?php if ($this->session->flashdata('success')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                text: "<?= $this->session->flashdata('success'); ?>",
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Oke, mengerti!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                },
                timer: 2000,
                timerProgressBar: true
            });
        });
    </script>
<?php elseif ($this->session->flashdata('warning')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                text: "<?= $this->session->flashdata('warning'); ?>",
                icon: "warning",
                buttonsStyling: !1,
                confirmButtonText: "Oke, mengerti!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                },
                timer: 2000,
                timerProgressBar: true
            });
        });
    </script>
<?php elseif ($this->session->flashdata('error')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                text: "<?= $this->session->flashdata('error'); ?>",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Oke, mengerti!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                },
                timer: 2000,
                timerProgressBar: true
            });
        });
    </script>
<?php elseif ($this->session->flashdata('status')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                text: "<?= $this->session->flashdata('status'); ?>",
                icon: "info",
                buttonsStyling: !1,
                confirmButtonText: "Oke, mengerti!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                },
                timer: 2000,
                timerProgressBar: true
            });
        });
    </script>
<?php endif; ?>
<?php if (validation_errors()): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                html: `<?= validation_errors('<div>', '</div>'); ?>`,
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Oke, mengerti!",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                },
                timer: 2000,
                timerProgressBar: true
            });
        });
    </script>
<?php endif; ?>