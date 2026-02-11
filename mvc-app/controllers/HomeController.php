<?php
class HomeController {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function index() {
        checkLogin();
        
        $pageTitle = 'Dashboard';
        
        // ngambil statik
        $totalMahasiswa = $this->conn->query("SELECT COUNT(*) as total FROM mahasiswa")->fetch_assoc()['total'];
        $totalProducts = $this->conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
        
        require_once 'views/layouts/header.php';
        require_once 'views/home.php';
        require_once 'views/layouts/footer.php';
    }
}
