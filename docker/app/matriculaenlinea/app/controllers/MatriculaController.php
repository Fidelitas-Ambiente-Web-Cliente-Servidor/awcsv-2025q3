<?php
session_start();

require_once '../../models/Matricula.php';
$matricula = new Matricula();

$action = $_POST['action'] ?? $_GET['action'] ?? null;

switch ($action) {

    case 'crear':

        $id_estudiante = $_POST['id_estudiante'];
        $periodo       = $_POST['periodo'];
        $grado         = $_POST['grado'];

        $matricula->crear($id_estudiante, $periodo, $grado);

        echo json_encode(["response" => 1]);

    case 'aprobar':

        $id = $_GET['id'];
        $matricula->cambiarEstado($id, 'aprobada');

        echo json_encode(["response" => 1]);


    case 'rechazar':

        $id = $_GET['id'];
        $matricula->cambiarEstado($id, 'rechazada');

        echo json_encode(["response" => 1]);

    default:
        echo "Acción no válida.";
        break;
}
