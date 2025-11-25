<h5> Hola!! <?php echo $_SESSION["usuario"]?></h5>
<a href="./app/views/logout.php">Salir</a>
<div class="input-group mb-3">
    <form id="formTask">
        <input type="text" id="task-input" class="form-control" name="tarea" placeholder="Nueva tarea">
        <input type="hidden" name="action" value="add">
        <button type="button" class="btn btn-primary" id="add-task">Agregar</button>
    </form>
</div>

<ul class="list-group" id="task-list">

</ul>