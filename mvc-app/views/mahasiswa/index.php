<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="bi bi-people"></i> Data Mahasiswa
            </h2>
            <a href="index.php?page=mahasiswa&action=create" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (empty($mahasiswaList)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3 text-muted">Belum ada data mahasiswa</h5>
                        <p class="text-muted">Klik tombol "Tambah Mahasiswa" untuk menambahkan data</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Foto</th>
                                    <th width="15%">NIM</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">Jurusan</th>
                                    <th width="20%">Alamat</th>
                                    <?php if (isAdmin()): ?>
                                        <th width="15%">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mahasiswaList as $index => $mahasiswa): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td>
                                            <?php if ($mahasiswa['foto']): ?>
                                                <img src="public/uploads/<?= $mahasiswa['foto'] ?>" 
                                                     alt="Foto" 
                                                     class="img-thumbnail" 
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            <?php else: ?>
                                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px; border-radius: 4px;">
                                                    <i class="bi bi-person" style="font-size: 2rem;"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($mahasiswa['nim']) ?></td>
                                        <td><?= htmlspecialchars($mahasiswa['name']) ?></td>
                                        <td>
                                            <span class="badge bg-info">
                                                <?= htmlspecialchars($mahasiswa['jurusan']) ?>
                                            </span>
                                        </td>
                                        <td><?= htmlspecialchars($mahasiswa['alamat']) ?></td>
                                        <?php if (isAdmin()): ?>
                                            <td class="table-actions">
                                                <a href="index.php?page=mahasiswa&action=edit&id=<?= $mahasiswa['id'] ?>" 
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" 
                                                   onclick="confirmDelete('index.php?page=mahasiswa&action=delete&id=<?= $mahasiswa['id'] ?>', 'mahasiswa')" 
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
                            <i class="bi bi-info-circle"></i> Total: <?= count($mahasiswaList) ?> mahasiswa
                        </small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
