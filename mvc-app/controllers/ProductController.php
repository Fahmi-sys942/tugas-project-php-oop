<?php
class ProductController {
    private $productModel;
    
    public function __construct($db) {
        $this->productModel = new Product($db);
    }
    
    public function index() {
        checkLogin();
        
        $search = $_GET['search'] ?? '';
        $pageTitle = 'Data Products';
        $productList = $this->productModel->getAll($search);
        
        require_once 'views/layouts/header.php';
        require_once 'views/products/index.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function create() {
        checkLogin();
        
        $pageTitle = 'Tambah Product';
        
        require_once 'views/layouts/header.php';
        require_once 'views/products/create.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function store() {
        checkLogin();
        
        $data = [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? 0
        ];
        
        if ($this->productModel->create($data)) {
            $_SESSION['success'] = 'Product berhasil ditambahkan';
        } else {
            $_SESSION['error'] = 'Gagal menambahkan product';
        }
        
        redirect('products');
    }
    
    public function edit() {
        checkLogin();
        checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        $product = $this->productModel->getById($id);
        
        if (!$product) {
            $_SESSION['error'] = 'Product tidak ditemukan';
            redirect('products');
        }
        
        $pageTitle = 'Edit Product';
        
        require_once 'views/layouts/header.php';
        require_once 'views/products/edit.php';
        require_once 'views/layouts/footer.php';
    }
    
    public function update() {
        checkLogin();
        checkAdmin();
        
        $id = $_POST['id'] ?? 0;
        
        $data = [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? 0
        ];
        
        if ($this->productModel->update($id, $data)) {
            $_SESSION['success'] = 'Product berhasil diupdate';
        } else {
            $_SESSION['error'] = 'Gagal mengupdate product';
        }
        
        redirect('products');
    }
    
    public function delete() {
        checkLogin();
        checkAdmin();
        
        $id = $_GET['id'] ?? 0;
        
        if ($this->productModel->delete($id)) {
            $_SESSION['success'] = 'Product berhasil dihapus';
        } else {
            $_SESSION['error'] = 'Gagal menghapus product';
        }
        
        redirect('products');
    }
}
