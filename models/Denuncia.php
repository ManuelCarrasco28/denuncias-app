<?php
class Denuncia {
    private $conn;
    private $table = "denuncias";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll($search, $start, $limit) {
        $sql = "SELECT * FROM $this->table 
                WHERE titulo LIKE :search 
                   OR ciudadano LIKE :search 
                   OR ubicacion LIKE :search
                ORDER BY fecha_registro DESC
                LIMIT :start, :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":search", "%$search%", PDO::PARAM_STR);
        $stmt->bindValue(":start", (int)$start, PDO::PARAM_INT);
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function count($search) {
        $sql = "SELECT COUNT(*) as total FROM $this->table 
                WHERE titulo LIKE :search 
                   OR ciudadano LIKE :search 
                   OR ubicacion LIKE :search";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":search", "%$search%", PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['total'] : 0;
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table 
            (titulo, descripcion, ubicacion, estado, ciudadano, telefono_ciudadano, fecha_registro)
            VALUES (:titulo, :descripcion, :ubicacion, :estado, :ciudadano, :telefono_ciudadano, :fecha_registro)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($data) {
        $sql = "UPDATE $this->table SET
                    titulo = :titulo,
                    descripcion = :descripcion,
                    ubicacion = :ubicacion,
                    estado = :estado,
                    ciudadano = :ciudadano,
                    telefono_ciudadano = :telefono_ciudadano,
                    fecha_registro = :fecha_registro
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":id" => $id]);
    }
}
