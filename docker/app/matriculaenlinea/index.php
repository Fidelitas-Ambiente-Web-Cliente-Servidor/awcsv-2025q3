<?php
session_start();
$page = $_GET['page'] ?? 'home';

if (!isset($_SESSION['usuario'])) {

    $publicRoutes = [
        'login'     => 'app/views/auth/login.php',
        'register'  => 'app/views/auth/register.php'
    ];

    if (isset($publicRoutes[$page])) {
        $view = $publicRoutes[$page];
        include 'app/views/layouts/auth.php';
        exit;
    }

    header("Location: index.php?page=login");
    exit;
}


$role = $_SESSION['rol'];


$routesAdmin = [
    'home'        => 'app/views/admin/dashboard.php',
    'estudiantes' => 'app/views/admin/estudiantes.php',
    'matriculas'  => 'app/views/admin/matriculas.php',
    'encargados'  => 'app/views/admin/encargados.php'
];

$routesEncargado = [
    'home'        => 'app/views/encargado/dashboard.php',
    'crear_estudiante'   => 'app/views/encargado/crear_estudiante.php',
    'matricular'  => 'app/views/encargado/matricular.php'
];


$allowedRoutes = ($role === 'admin') ? $routesAdmin : $routesEncargado;


if (!isset($allowedRoutes[$page])) {
    $view = 'app/views/errors/no-autorizado.php';
} else {
    $view = $allowedRoutes[$page];
}


$layout = ($role === 'admin')
    ? 'app/views/layouts/admin.php'
    : 'app/views/layouts/encargado.php';



include $layout;

