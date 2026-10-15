<?php
/**
 * 
 */
class user
{
    private $conn;
    private $table = "biodata";
    
    function __construct ($db)
    {
        // code...
        $this->conn = $db;
    }

    public function getAll($keyword = null)
    {
        // code...
        if (!empty($keyword)) {
            $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword OR alamat LIKE :keyword OR tempat_tanggal_lahir LIKE :keyword OR jenis_kelamin LIKE :keyword OR agama LIKE :keyword ORDER BY id ASC";
            $stmt = $this->conn->prepare($query);
            $searchTerm = "%" . $keyword . "%";
            $stmt->bindParam(":keyword", $searchTerm);
            $stmt->execute();
            return $stmt;
        }

        $query = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function insert($nama, $alamat, $tempat_tanggal_lahir, $jenis_kelamin, $agama)
    {
        //code...
        $query = "INSERT INTO " . $this->table . " (nama, alamat, tempat_tanggal_lahir, jenis_kelamin, agama) VALUES (:nama, :alamat, :tempat_tanggal_lahir, :jenis_kelamin, :agama)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":tempat_tanggal_lahir", $tempat_tanggal_lahir);
        $stmt->bindParam(":jenis_kelamin", $jenis_kelamin);
        $stmt->bindParam(":agama", $agama);
        return $stmt->execute();
    }

    public function getById($id)
    {
        //code...
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0 , 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nama, $alamat, $tempat_tanggal_lahir, $jenis_kelamin, $agama)
    {
        //code...
        $query = "UPDATE " . $this->table . " SET nama = :nama, alamat = :alamat, tempat_tanggal_lahir = :tempat_tanggal_lahir, jenis_kelamin = :jenis_kelamin, agama = :agama WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":tempat_tanggal_lahir", $tempat_tanggal_lahir);
        $stmt->bindParam(":jenis_kelamin", $jenis_kelamin);
        $stmt->bindParam(":agama", $agama);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        //code...
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}