<div class="row">
    <div class="col-12">
        <h2 class="mb-4">
            <i class="bi bi-speedometer2"></i> Dashboard
        </h2>
    </div>
</div>

<div class="row g-4">
    <!-- Welcome Card -->
    <div class="col-12">
        <div class="card border-0 bg-primary text-white">
            <div class="card-body p-4">
                <h4 class="card-title">
                    <i class="bi bi-emoji-smile"></i> Selamat Datang, <?= $_SESSION['username'] ?>!
                </h4>
                <p class="card-text">
                    Anda login sebagai <strong><?= ucfirst($_SESSION['role']) ?></strong>
                </p>
                <small>
                    <i class="bi bi-clock"></i> <?= date('l, d F Y H:i:s') ?>
                </small>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="col-md-6">
        <div class="card border-0 border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Mahasiswa</h6>
                        <h2 class="mb-0"><?= $totalMahasiswa ?></h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-people" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <a href="index.php?page=mahasiswa" class="btn btn-sm btn-outline-primary mt-3">
                    <i class="bi bi-arrow-right"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Products</h6>
                        <h2 class="mb-0"><?= $totalProducts ?></h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <a href="index.php?page=products" class="btn btn-sm btn-outline-success mt-3">
                    <i class="bi bi-arrow-right"></i> Lihat Data
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-lightning"></i> Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="index.php?page=mahasiswa&action=create" class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php?page=products&action=create" class="btn btn-success w-100">
                            <i class="bi bi-plus-circle"></i> Tambah Product
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php?page=login&action=logout" class="btn btn-outline-danger w-100">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Info -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-info-circle"></i> Informasi Akses
                </h5>
            </div>
            <div class="card-body">
                <?php if (isAdmin()): ?>
                    <div class="alert alert-info mb-0">
                        <h6 class="alert-heading">
                            <i class="bi bi-shield-check"></i> Hak Akses Admin
                        </h6>
                        <p class="mb-0">
                            Sebagai admin, Anda memiliki akses penuh untuk:
                        </p>
                        <ul class="mb-0 mt-2">
                            <li>Menambah, mengedit, dan menghapus data mahasiswa</li>
                            <li>Menambah, mengedit, dan menghapus data products</li>
                            <li>Mengelola semua data dalam sistem</li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning mb-0">
                        <h6 class="alert-heading">
                            <i class="bi bi-person"></i> Hak Akses User
                        </h6>
                        <p class="mb-0">
                            Sebagai user, Anda dapat:
                        </p>
                        <ul class="mb-0 mt-2">
                            <li>Menambah data mahasiswa</li>
                            <li>Menambah data products</li>
                            <li>Melihat semua data</li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="bi bi-exclamation-circle"></i> Anda tidak dapat mengedit atau menghapus data. Hubungi admin untuk akses lebih lanjut.
                        </small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
