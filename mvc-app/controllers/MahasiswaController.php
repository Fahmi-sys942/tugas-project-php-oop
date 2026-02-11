<?php
class MahasiswaController {
    private $mahasiswaModel;
    
    public function __construct($db) {
        $this->mahasiswaModel = new Mahasiswa($db);
    }
    
    public function index() {
        checkLogin();
        
        $pageTitle = 'Data Mahasiswa';
        $mahasiswaList = $this->mahasiswaModel->getAll();
        
        require_once 'views/layouts/header.php';
        require_once 'views/mahasiswa/index.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function create() {
        checkLogin();
        
        $pageTitle = 'Tambah Mahasiswa';
        
        require_once 'views/layouts/header.php';
        require_once 'views/mahasiswa/create.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function store() {
        checkLogin();
        
        $data = [
            'nim' => $_POST['nim'] ?? '',
            'name' => $_POST['name'] ?? '',
            'jurusan' => $_POST['jurusan'] ?? '',
            'foto' => '',
            'alamat' => $_POST['alamat'] ?? ''
        ];
        
        // Handle file upload
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = uploadImage($_FILES['foto']);
            if ($foto) {
                $data['foto'] = $foto;
            }
        }
        
        if ($this->mahasiswaModel->create($data)) {
            $_SESSION['success'] = 'Mahasiswa berhasil ditambahkan';
        } else {
            $_SESSION['error'] = 'Gagal menambahkan mahasiswa';
        }
        
        redirect('mahasiswa');
    }
    
    public function edit() {
        checkLogin();
        checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        $mahasiswa = $this->mahasiswaModel->getById($id);
        
        if (!$mahasiswa) {
            $_SESSION['error'] = 'Mahasiswa tidak ditemukan';
            redirect('mahasiswa');
        }
        
        $pageTitle = 'Edit Mahasiswa';
        
        require_once 'views/layouts/header.php';
        require_once 'views/mahasiswa/edit.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function update() {
        checkLogin();
        checkAdmin();
        
        $id = $_POST['id'] ?? 0;
        $mahasiswa = $this->mahasiswaModel->getById($id);
        
        if (!$mahasiswa) {
            $_SESSION['error'] = 'Mahasiswa tidak ditemukan';
            redirect('mahasiswa');
        }
        
        $data = [
            'nim' => $_POST['nim'] ?? '',
            'name' => $_POST['name'] ?? '',
            'jurusan' => $_POST['jurusan'] ?? '',
            'foto' => $mahasiswa['foto'],
            'alamat' => $_POST['alamat'] ?? ''
        ];
        
        // Handle file upload
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = uploadImage($_FILES['foto']);
            if ($foto) {
                // Delete old foto
                if ($mahasiswa['foto'] && file_exists('public/uploads/' . $mahasiswa['foto'])) {
                    unlink('public/uploads/' . $mahasiswa['foto']);
                }
                $data['foto'] = $foto;
            }
        }
        
        if ($this->mahasiswaModel->update($id, $data)) {
            $_SESSION['success'] = 'Mahasiswa berhasil diupdate';
        } else {
            $_SESSION['error'] = 'Gagal mengupdate mahasiswa';
        }
        
        redirect('mahasiswa');
    }
    
    public function delete() {
        checkLogin();
        checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        
        if ($this->mahasiswaModel->delete($id)) {
            $_SESSION['success'] = 'Mahasiswa berhasil dihapus';
        } else {
            $_SESSION['error'] = 'Gagal menghapus mahasiswa';
        }
        
        redirect('mahasiswa');
    }
}
