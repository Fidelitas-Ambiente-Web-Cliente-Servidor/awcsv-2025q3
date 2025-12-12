<?php
session_start();
require_once '../../config/database.php';
require_once '../models/User.php';

$userModel = new User($conn);

header('Content-Type: application/json'); // jquery

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $data = json_decode(file_get_contents("php://input"), true); jquery
        $data = $_POST;
        $action = $data['action'] ?? '';

        if ($action === 'login' && !empty($data['username']) && !empty($data['password'])) {
            $user = $userModel->login($data['username']);
            if (!empty($user) && password_verify($data["password"], $user[0]["password"])) {
                $_SESSION["usuario"] = $data['username'];
                $_SESSION["id"] = $user[0]['id'];
                $_SESSION["rol"] = $user[0]['rol'];
                echo json_encode(["response" => 1]);
            } else {
                echo "Error de autentificacion";
                echo json_encode(["response" => 0]);
                session_destroy();
            }
        } elseif ($action === 'register' && !empty($data['username']) && !empty($data['password'] && !empty($data['rol']))) {
            $user = $userModel->register($data['username'], password_hash($data['password'], PASSWORD_BCRYPT), $data['rol']);
           echo json_encode(["response" => 1]);
        } else {
            throw new Exception("Acción no válida o parámetros incorrectos.");
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
