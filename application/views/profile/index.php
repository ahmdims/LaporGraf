<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('asset/media/avatars/blank.png'); ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $user['nama_siswa'] ?? $user['nama_guru'] ?? $user['nama_manajemen'] ?? $user['nama'] ?? ''; ?>
                    </h5>
                    <p class="card-text"><?= $user['user_id']; ?></p>
                    <?php if (isset($user['date_created'])): ?>
                        <p class="card-text"><small class="text-muted">Member since
                                <?= date('d F Y', $user['date_created']); ?></small></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= base_url('profile/edit'); ?>" class="btn btn-primary">Ubah Profil</a>
    <a href="<?= base_url('profile/change_password'); ?>" class="btn btn-warning">Ubah Password</a>
</div>