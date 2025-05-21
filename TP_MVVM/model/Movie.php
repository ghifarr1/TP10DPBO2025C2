<?php
require_once 'config/Database.php';

class Movie {
    private $conn;
    private $table = 'movie';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua film beserta genre dan jadwal tayangnya
    public function getAll() {
        $query = "SELECT m.id, m.title, g.name AS genre_name, 
                         sh.time AS showtime_time, sh.description AS showtime_desc 
                  FROM " . $this->table . " m 
                  JOIN genre g ON m.genre_id = g.id 
                  JOIN showtime sh ON m.showtime_id = sh.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu film berdasarkan ID
    public function getById($id) {
        $query = "SELECT m.id, m.title, g.name AS genre_name, 
                         sh.time AS showtime_time, sh.description AS showtime_desc 
                  FROM " . $this->table . " m 
                  JOIN genre g ON m.genre_id = g.id 
                  JOIN showtime sh ON m.showtime_id = sh.id 
                  WHERE m.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah film baru
    public function create($title, $genre_id, $showtime_id) {
        $query = "INSERT INTO " . $this->table . " (title, genre_id, showtime_id) 
                  VALUES (:title, :genre_id, :showtime_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre_id', $genre_id);
        $stmt->bindParam(':showtime_id', $showtime_id);
        return $stmt->execute();
    }

    // Update data film
    public function update($id, $title, $genre_id, $showtime_id) {
        $query = "UPDATE " . $this->table . " 
                  SET title = :title, genre_id = :genre_id, showtime_id = :showtime_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre_id', $genre_id);
        $stmt->bindParam(':showtime_id', $showtime_id);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Hapus film
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
