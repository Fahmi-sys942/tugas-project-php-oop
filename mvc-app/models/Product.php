<?php
class Product {
    private $conn;
    private $table = 'products';
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAll($search = '') {
        if ($search) {
            $searchTerm = "%{$search}%";
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name LIKE ? ORDER BY created_at DESC");
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } else {
            $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
            $result = $this->conn->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, price) VALUES (?, ?)");
        $stmt->bind_param("sd", $data['name'], $data['price']);
        return $stmt->execute();
    }
    
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sdi", $data['name'], $data['price'], $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
