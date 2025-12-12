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

        switch ($action) {
            case 'login':
                $user = $userModel->login($data['username']);

                if (!empty($user) && password_verify($data["password"], $user[0]["clave"])) {
                    $_SESSION["usuario"] = $data['username'];
                    $_SESSION["id"] = $user[0]['id'];
                    $_SESSION["rol"] = $user[0]['rol'];
                    echo json_encode(["response" => 1]);
                } else {
                    echo "Error de autentificacion";
                    session_destroy();
                    echo json_encode(["response" => 0]);
                }
                break;
            case 'register':
                $user = $userModel->login($data['username']);
                if (!empty($user) && password_verify($data["password"], $user[0]["clave"])) {
                    $_SESSION["usuario"] = $data['username'];
                    $_SESSION["id"] = $user[0]['id'];
                    $_SESSION["rol"] = $user[0]['rol'];
                    echo json_encode(["response" => 1]);
                } else {
                    echo "Error de autentificacion";
                    session_destroy();
                    echo json_encode(["response" => 0]);
                }
                break;
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
