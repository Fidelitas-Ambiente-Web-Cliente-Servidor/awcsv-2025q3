<?php
require_once 'config/database.php';

class Matricula
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    // Crear matrícula
    public function crear($id_estudiante, $periodo, $grado)
    {
        $sql = "INSERT INTO matriculas (id_estudiante, periodo, grado) 
                VALUES (:id_estudiante, :periodo, :grado)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id_estudiante' => $id_estudiante,
            ':periodo'        => $periodo,
            ':grado'          => $grado
        ]);
    }
    public function obtenerPorEstudiante($id_estudiante)
    {
        $sql = "SELECT * FROM matriculas WHERE id_estudiante = ? 
                ORDER BY id DESC LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_estudiante]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cambiarEstado($id, $estado)
    {
        $sql = "UPDATE matriculas SET estado = :estado WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id'     => $id,
            ':estado' => $estado
        ]);
    }

    public function obtenerTodas()
    {
        $sql = "SELECT m.*, e.nombre, e.apellido
                FROM matriculas m
                INNER JOIN estudiantes e ON e.id = m.id_estudiante
                ORDER BY m.id DESC";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
