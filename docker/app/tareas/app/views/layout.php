<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="public/js/auth.js" defer></script>
    <script src="public/js/task.js" defer></script>
</head>

<body class="container mt-5">
    <h1 class="text-center">Gestión de Tareas</h1>
    <?php if (!empty($_SESSION)) {
        include 'tasks.php';
    } else {
        include 'login.php';
    } ?>
</body>

</html>