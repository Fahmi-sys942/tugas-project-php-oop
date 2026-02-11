<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-pencil"></i> Edit Product
            </h2>
            <a href="index.php?page=products" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">
                    <i class="bi bi-clipboard-check"></i> Form Edit Product
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=products&action=update">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Product <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?= htmlspecialchars($product['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">
                            Harga <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="price" name="price" 
                                   value="<?= $product['price'] ?>" required min="0" step="0.01">
                        </div>
                    </div>

                    <div class="alert alert-secondary">
                        <i class="bi bi-calendar"></i> 
                        <strong>Dibuat pada:</strong> <?= date('d F Y H:i:s', strtotime($product['created_at'])) ?>
                    </div>

                    <hr>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=products" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
