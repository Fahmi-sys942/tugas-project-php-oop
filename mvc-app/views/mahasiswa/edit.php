<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-pencil"></i> Edit Mahasiswa
            </h2>
            <a href="index.php?page=mahasiswa" class="btn btn-secondary">
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
                    <i class="bi bi-clipboard-check"></i> Form Edit Mahasiswa
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=mahasiswa&action=update" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">

                    <div class="mb-3">
                        <label for="nim" class="form-label">
                            NIM <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="nim" name="nim" 
                               value="<?= htmlspecialchars($mahasiswa['nim']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Lengkap <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?= htmlspecialchars($mahasiswa['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">
                            Jurusan <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika" <?= $mahasiswa['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?= $mahasiswa['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                            <option value="Teknik Komputer" <?= $mahasiswa['jurusan'] == 'Teknik Komputer' ? 'selected' : '' ?>>Teknik Komputer</option>
                            <option value="Manajemen Informatika" <?= $mahasiswa['jurusan'] == 'Manajemen Informatika' ? 'selected' : '' ?>>Manajemen Informatika</option>
                            <option value="Teknik Elektro" <?= $mahasiswa['jurusan'] == 'Teknik Elektro' ? 'selected' : '' ?>>Teknik Elektro</option>
                            <option value="Teknik Mesin" <?= $mahasiswa['jurusan'] == 'Teknik Mesin' ? 'selected' : '' ?>>Teknik Mesin</option>
                            <option value="Teknik Sipil" <?= $mahasiswa['jurusan'] == 'Teknik Sipil' ? 'selected' : '' ?>>Teknik Sipil</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            Foto
                        </label>
                        <?php if ($mahasiswa['foto']): ?>
                            <div class="mb-2">
                                <img src="public/uploads/<?= $mahasiswa['foto'] ?>" alt="Foto" class="img-thumbnail" style="max-width: 200px;">
                                <p class="text-muted small mb-0">Foto saat ini</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max 2MB). Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">
                            Alamat <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="4" required><?= htmlspecialchars($mahasiswa['alamat']) ?></textarea>
                    </div>

                    <hr>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=mahasiswa" class="btn btn-secondary">
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
