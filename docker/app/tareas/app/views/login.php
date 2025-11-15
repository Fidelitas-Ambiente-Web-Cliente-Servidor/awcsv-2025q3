<div class="input-group mb-3">
    <form method="POST" action="app/controllers/UserController.php" id="formLogin">
        <input type="text" id="username" class="form-control" name="username" placeholder="Usuario">
        <input type="password" id="password" class="form-control" name="password" placeholder="Clave">
        <input type="hidden" name="action" value="login">
        <button class="btn btn-primary" id="btnLogin">Login</button>
    </form>
</div>
