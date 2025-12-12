<?php
session_start();
require_once '../../config/database.php';
require_once '../models/Estudiante.php';

$estudiantekModel = new Estudiante();

header('Content-Type: application/json');

if (isset($_POST['action']) && $_POST['action'] == 'crear_estudiante') {

    if ($_SESSION['rol'] !== 'encargado') {
        header("Location: ../../index.php?error=No autorizado");
        exit();
    }

    $encargado_id = $_SESSION['id'];  
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $grado = $_POST['grado'];

    $ok = Estudiante::crear($encargado_id, $nombre, $fecha_nacimiento, $grado);

    if ($ok) {
        header("Location: ../../app/views/encargado/dashboard.php?success=1");
    } else {
        header("Location: ../../app/views/encargado/dashboard.php?error=1");
    }
}
