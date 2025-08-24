<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang, <?= htmlspecialchars($user); ?>!</h1>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengaduan Saya
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_saya; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu Konfirmasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_diproses; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengaduan Selesai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_selesai; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat Laporan Baru</h6>
        </div>
        <div class="card-body">
            <p>Jika Anda memiliki keluhan, laporan, atau aspirasi, jangan ragu untuk menyampaikannya melalui sistem ini.
            </p>
            <a href="<?= site_url('siswa/pengaduan/create'); ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Buat Pengaduan Baru
            </a>
        </div>
    </div>
</div>