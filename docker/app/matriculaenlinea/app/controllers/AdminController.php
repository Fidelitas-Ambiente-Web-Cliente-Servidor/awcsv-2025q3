<?php
session_start();
require_once '../../config/database.php';

header("Content-Type: application/json");

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "admin") {
    echo json_encode(["error" => "No autorizado"]);
    exit;
}


$sql = "
    SELECT 
        e.id AS estudiante_id,
        e.nombre AS estudiante_nombre,
        e.apellido AS estudiante_apellido,
        u.usuario AS encargado,
        
        m.periodo,
        m.grado,
        m.estado
        
    FROM estudiantes e
    INNER JOIN usuarios u ON e.encargado_id = u.id
    
    LEFT JOIN matriculas m ON m.id = (
        SELECT id FROM matriculas 
        WHERE id_estudiante = e.id 
        ORDER BY id DESC LIMIT 1
    )
";

$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
