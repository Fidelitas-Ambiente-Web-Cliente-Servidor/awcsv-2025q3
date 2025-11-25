<?php
require_once '../../config/database.php';
require_once '../models/Task.php';

$taskModel = new Task($conn);

header('Content-Type: application/json');

try {

    // $data = json_decode(file_get_contents("php://input"), true);
    $data = $_POST;

    $action = $data['action'] ?? '';

    switch ($action) {
        case 'all':
            echo json_encode($taskModel->getAll());
            break;
        case 'add':
            $taskModel->add($data['tarea']);
            echo json_encode(["response" => 1]);
            break;
        case 'delete':
            $taskModel->delete($data['id']);
            echo json_encode(["response" => 1]);
            break;
        case 'completed':
            $taskModel->complete($data['id']);
            echo json_encode(["response" => 1]);
            break;
        default:
            echo json_encode(["response" => 0, "message" => "Acción no válida o parámetros incorrectos."]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
