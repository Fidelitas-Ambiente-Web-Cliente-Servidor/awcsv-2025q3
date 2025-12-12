<h3 class="mb-4">Panel del Administrador</h3>
<div class="d-flex justify-content-end mb-3">
    <a href="app/views/logout.php" class="btn btn-danger">
        Cerrar sesión
    </a>
</div>

<div class="mb-12">
    <label>Filtrar por Estado:</label>
    <select id="filtroEstado" class="form-control">
        <option value="">Todos</option>
        <option value="pendiente">Pendiente</option>
        <option value="aprobada">Aprobada</option>
        <option value="rechazada">Rechazada</option>
    </select>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Estudiante</th>
            <th>Encargado</th>
            <th>Periodo</th>
            <th>Grado</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody id="tablaAdmin"></tbody>
</table>
