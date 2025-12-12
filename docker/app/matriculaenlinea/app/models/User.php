<?php
require_once '../../config/database.php';

class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function login($username): array
    {
        try {
            $stmt = $this->conn->prepare("select * from usuarios  where username = :username");
            $stmt->execute(['username' => $username]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["error" => "Error al obtener tareas: " . $e->getMessage()];
        }
    }

    public function register($username, $password, $rol): bool
    {

        try {
            $stmt = $this->conn->prepare("INSERT INTO usuarios (username, password, rol) VALUES (:username, :password, :rol)");
            $stmt->execute(['username' => $username, 'password' => $password, 'rol' => $rol]);
            if ($rol === "encargado") {
                $usuario_id = $this->conn->lastInsertId();
                $telefono = "8888-8888";
                $direccion = "San José, Costa Rica";
                $cedula = "1-2345-6789";
                $parentesco = "Padre";

                $stmt2 = $this->conn->prepare("
        INSERT INTO encargados (usuario_id, telefono, direccion, cedula, parentesco)
        VALUES (:usuario_id, :telefono, :direccion, :cedula, :parentesco)
    ");

                return  $stmt2->execute([
                    'usuario_id' => $usuario_id,
                    'telefono' => $telefono,
                    'direccion' => $direccion,
                    'cedula' => $cedula,
                    'parentesco' => $parentesco
                ]);
            }

            return 1;
        } catch (PDOException $e) {
            return false;
        }
    }
}
