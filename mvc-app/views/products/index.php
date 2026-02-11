<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-box-seam"></i> Data Products
            </h2>
            <a href="index.php?page=products&action=create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Product
            </a>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="index.php" class="row g-3">
                    <input type="hidden" name="page" value="products">
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Cari berdasarkan nama product..." 
                                   value="<?= htmlspecialchars($search ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (empty($productList)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3 text-muted">
                            <?= $search ? 'Produk tidak ditemukan' : 'Belum ada data product' ?>
                        </h5>
                        <p class="text-muted">
                            <?= $search ? 'Coba kata kunci lain' : 'Klik tombol "Tambah Product" untuk menambahkan data' ?>
                        </p>
                        <?php if ($search): ?>
                            <a href="index.php?page=products" class="btn btn-primary">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset Pencarian
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">No</th>
                                    <th width="40%">Nama Product</th>
                                    <th width="20%">Harga</th>
                                    <th width="20%">Dibuat Pada</th>
                                    <?php if (isAdmin()): ?>
                                        <th width="10%">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productList as $index => $product): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td>
                                            <strong><?= htmlspecialchars($product['name']) ?></strong>
                                        </td>
                                        <td>
                                            <span class="badge bg-success" style="font-size: 0.9rem;">
                                                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar"></i>
                                                <?= date('d/m/Y H:i', strtotime($product['created_at'])) ?>
                                            </small>
                                        </td>
                                        <?php if (isAdmin()): ?>
                                            <td class="table-actions">
                                                <a href="index.php?page=products&action=edit&id=<?= $product['id'] ?>" 
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" 
                                                   onclick="confirmDelete('index.php?page=products&action=delete&id=<?= $product['id'] ?>', 'product')" 
                                                   class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> 
                            <?= $search ? 'Ditemukan ' . count($productList) . ' product' : 'Total: ' . count($productList) . ' products' ?>
                        </small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
