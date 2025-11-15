<?php
require_once 'config/database.php';
$result = $conn->query("SELECT * FROM tareas ORDER BY id DESC");
?>
<h5> Hola!! <?php echo $_SESSION["usuario"]?></h5>
<a href="./app/views/logout.php">Salir</a>
<div class="input-group mb-3">
    <form method="POST" action="app/controllers/TaskController.php" id="formTask">
        <input type="text" id="task-input" class="form-control" name="tarea" placeholder="Nueva tarea">
        <input type="hidden" name="action" value="add">
        <button class="btn btn-primary" id="add-task">Agregar</button>
    </form>
</div>

<ul class="list-group" id="task-list">
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= htmlspecialchars($row['descripcion']) ?>
            <a href="app/controllers/TaskController.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">ELIMINAR</a>
        </li>
    <?php } ?>
</ul>