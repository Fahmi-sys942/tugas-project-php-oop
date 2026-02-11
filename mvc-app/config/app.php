<?php
// config nya
define('APP_NAME', 'MVC Application');
define('BASE_URL', 'http://localhost/mvc-app/');
define('UPLOAD_PATH', 'public/uploads/');

// function nya
function redirect($page) {
    header("Location: index.php?page=$page");
    exit;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function checkLogin() {
    if (!isLoggedIn()) {
        redirect('login');
    }
}

function checkAdmin() {
    if (!isAdmin()) {
        $_SESSION['error'] = 'Access denied. Admin only.';
        redirect('home');
    }
}

function uploadImage($file, $targetDir = 'public/uploads/') {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        return null;
    }
    
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '_' . time() . '.' . $extension;
    $targetFile = $targetDir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $filename;
    }
    
    return null;
}
