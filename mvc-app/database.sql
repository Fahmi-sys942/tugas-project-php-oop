-- Database: mvc_app
-- Buat database terlebih dahulu

CREATE DATABASE IF NOT EXISTS mvc_app;
USE mvc_app;

-- Table: users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    alamat TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- masukin contoh data user
-- Password untuk admin: admin123
-- Password untuk user: user123
INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user');

-- masukin contoh data mahasiswa
INSERT INTO mahasiswa (nim, name, jurusan, alamat) VALUES
('2021001', 'Ahmad Fauzi', 'Teknik Informatika', 'Jl. Merdeka No. 123, Jakarta'),
('2021002', 'Siti Nurhaliza', 'Sistem Informasi', 'Jl. Sudirman No. 456, Bandung'),
('2021003', 'Budi Santoso', 'Teknik Komputer', 'Jl. Ahmad Yani No. 789, Surabaya');

-- masukin contoh data product
INSERT INTO products (name, price) VALUES
('Laptop ASUS ROG Strix G15', 15000000.00),
('Mouse Gaming Logitech G502', 750000.00),
('Keyboard Mechanical RGB', 1200000.00),
('Monitor LG 24 inch', 2500000.00),
('Headset Gaming HyperX', 850000.00);
