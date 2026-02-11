<?php
class Mahasiswa {
    private $conn;
    private $table = 'mahasiswa';
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (nim, name, jurusan, foto, alamat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $data['nim'], $data['name'], $data['jurusan'], $data['foto'], $data['alamat']);
        return $stmt->execute();
    }
    
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET nim = ?, name = ?, jurusan = ?, foto = ?, alamat = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $data['nim'], $data['name'], $data['jurusan'], $data['foto'], $data['alamat'], $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        //mengambil foto untuk menghapus file
        $mahasiswa = $this->getById($id);
        if ($mahasiswa && $mahasiswa['foto'] && file_exists('public/uploads/' . $mahasiswa['foto'])) {
            unlink('public/uploads/' . $mahasiswa['foto']);
        }
        
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
