<?php
session_start();
require_once '../../config/database.php';

header("Content-Type: application/json");


if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'encargado') {
    echo json_encode(["error" => "No autorizado"]);
    exit;
}

$idEncargado = $_SESSION["id"];

$stmt = $conn->prepare("SELECT * FROM estudiantes WHERE encargado_id = ?");
$stmt->execute([$idEncargado]);
$hijos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = [];

foreach ($hijos as $hijo) {

    $stm = $conn->prepare("
        SELECT * FROM matriculas 
        WHERE estudiante_id = ? 
        ORDER BY id DESC 
        LIMIT 1
    ");
    $stm->execute([$hijo["id"]]);
    $matricula = $stm->fetch(PDO::FETCH_ASSOC);


    $data[] = [
        "estudiante" => $hijo,
        "matricula"  => $matricula ? $matricula : null
    ];
}


echo json_encode($data);
