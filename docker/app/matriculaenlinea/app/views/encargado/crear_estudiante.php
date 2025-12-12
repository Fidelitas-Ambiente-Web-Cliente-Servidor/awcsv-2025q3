<h3>Registrar Estudiante</h3>

<form id="formEstudiante">
    <input type="hidden" name="action" value="crear_estudiante">

    <div class="mb-3">
        <label>Nombre completo:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Grado a matricular:</label>
        <input type="text" name="grado" class="form-control" required>
    </div>

    <button class="btn btn-primary">Guardar estudiante</button>
</form>

<div id="respuestaEstudiante"></div>
