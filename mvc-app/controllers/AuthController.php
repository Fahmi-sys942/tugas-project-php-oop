<?php
class AuthController {
    private $userModel;
    
    public function __construct($db) {
        $this->userModel = new User($db);
    }
    
    public function login() {
        if (isLoggedIn()) {
            redirect('home');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Username and password are required';
                redirect('login');
            }
            
            $user = $this->userModel->login($username, $password);
            
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['success'] = 'Login successful!';
                redirect('home');
            } else {
                $_SESSION['error'] = 'Invalid username or password';
                redirect('login');
            }
        } else {
            require_once 'views/auth/login.php';
        }
    }
    
    public function logout() {
        session_destroy();
        redirect('login');
    }
}
