<?php
require_once 'config/Database.php';

class Showtime {
    private $conn;
    private $table = 'showtime';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($time, $description) {
        $query = "INSERT INTO " . $this->table . " (time, description) VALUES (:time, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    public function update($id, $time, $description) {
        $query = "UPDATE " . $this->table . " 
                SET `time` = :time, `description` = :description 
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>