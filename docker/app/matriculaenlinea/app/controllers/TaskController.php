<?php
require_once '../../config/database.php';
require_once '../models/Task.php';

$taskModel = new Task($conn);

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $data = json_decode(file_get_contents("php://input"), true);
        $data = $_POST;

        $action = $data['action'] ?? '';

        if ($action === 'add' && !empty($data['tarea'])) {
            $taskModel->add($data['tarea']);
            header("Location: ../../index.php");
        } else {
            throw new Exception("Acción no válida o parámetros incorrectos.");
        }
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // $data = json_decode(file_get_contents("php://input"), true);
            $data = $_GET;

            $action = $data['action'] ?? '';

            if ($action === 'delete' && !empty($data['id'])) {
                $taskModel->delete($data['id']);
            } elseif ($action === 'completed' && !empty($data['id'])) {
                $taskModel->complete($data['id']);
            } else {
                throw new Exception("Acción no válida o parámetros incorrectos.");
            }
            header("Location: ../../index.php");
        } else {
            echo json_encode($taskModel->getAll());
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
