<?php
require_once '../../config/database.php';

class Estudiante
{

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public static function crear($encargado_id, $nombre, $fecha_nacimiento, $grado)
    {
        global $conn;

        $sql = "INSERT INTO estudiantes (encargado_id, nombre, fecha_nacimiento, grado)
                VALUES (:encargado_id, :nombre, :fecha_nacimiento, :grado)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':encargado_id', $encargado_id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':grado', $grado);

        return $stmt->execute();
    }
}
