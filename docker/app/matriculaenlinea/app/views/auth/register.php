<div class="input-group mb-3">
    <form method="POST" action="app/controllers/UserController.php" id="formLogin">
        <input type="text" id="username" class="form-control" name="username" placeholder="Usuario">
        <input type="password" id="password" class="form-control" name="password" placeholder="Clave">
        <select name="rol" class="form-control mb-3">
            <option value="encargado">Encargado</option>
        </select>
        <input type="hidden" name="action" value="register">
        <button class="btn btn-primary" id="btnRegister">Registrar</button>

    </form>
</div>