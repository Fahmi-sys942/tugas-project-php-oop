<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
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
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-clipboard-plus"></i> Form Tambah Mahasiswa
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?page=mahasiswa&action=store" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nim" class="form-label">
                            NIM <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="nim" name="nim" required placeholder="Masukkan NIM">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Lengkap <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">
                            Jurusan <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            Foto
                        </label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG, GIF (Max 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">
                            Alamat <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="4" required placeholder="Masukkan alamat lengkap"></textarea>
                    </div>

                    <hr>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?page=mahasiswa" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
