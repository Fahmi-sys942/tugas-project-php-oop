<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-plus-circle"></i> Tambah Product
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
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="bi bi-clipboard-plus"></i> Form Tambah Product
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=products&action=store">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Product <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required 
                               placeholder="Masukkan nama product">
                        <small class="text-muted">Contoh: Laptop ASUS ROG, Mouse Gaming Logitech</small>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">
                            Harga <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="price" name="price" required 
                                   min="0" step="0.01" placeholder="0">
                        </div>
                        <small class="text-muted">Masukkan harga dalam Rupiah</small>
                    </div>

                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> 
                        <strong>Info:</strong> Tanggal pembuatan akan otomatis diisi saat data disimpan.
                    </div>

                    <hr>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=products" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
