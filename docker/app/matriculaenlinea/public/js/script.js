$(document).ready(function () {

    $("#formLogin").on("submit", function (e) {
        e.preventDefault();
        $.post({
            url: "app/controllers/UserController.php",
            data: $(this).serialize(),
            success: function (resp) {
                console.log(resp)
                $("#respuestaLogin").html(`
                    <div class="alert alert-success">Registro exitoso</div>
                `);
                window.location.href = " index.php?page=home";
            },
            error: function () {
                $("#respuestaLogin").html(`
                    <div class="alert alert-danger">Error al registrar</div>
                `);
            }
        });
    });

    $("#formEstudiante").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "app/controllers/EstudianteController.php",
            method: "POST",
            data: $(this).serialize(),
            success: function (res) {
                $("#respuestaEstudiante").html(`
                    <div class="alert alert-success">Estudiante registrado con éxito</div>
                `);

                // Opcional: limpiar formulario
                $("#formEstudiante")[0].reset();
            },
            error: function () {
                $("#respuestaEstudiante").html(`
                    <div class="alert alert-danger">Error al registrar</div>
                `);
            }
        });

    });

    $(".formMatricula").on("submit", function (e) {
        e.preventDefault();
        console.log("Test")
        let formulario = $(this);

        $.post({
            url: "app/controllers/MatriculaController.php",
            data: formulario.serialize(),
            success: function (resp) {
                formulario.parent().html(`
                    <div class="alert alert-success">Matrícula enviada correctamente</div>
                `);
            },
            error: function () {
                formulario.parent().append(`
                    <div class="alert alert-danger">Error al enviar la matrícula</div>
                `);
            }
        });

    });

    cargarDashboard();

    cargarTabla();

    $("#filtroEstado").on("change", function () {
        cargarTabla();
    });
});


function cargarTabla() {

    $.ajax({
        url: "app/controllers/AdminController.php",
        method: "POST",
        success: function (data) {

            let estadoFiltro = $("#filtroEstado").val();

            let html = "";

            data.forEach(item => {

                if (estadoFiltro && item.estado !== estadoFiltro) {
                    return; // saltar si no coincide el filtro
                }

                let badge = {
                    pendiente: "warning",
                    aprobada: "success",
                    rechazada: "danger"
                }[item.estado] ?? "secondary";

                html += `
                    <tr>
                        <td>${item.estudiante_nombre} ${item.estudiante_apellido}</td>
                        <td>${item.encargado}</td>
                        <td>${item.periodo ?? '-'}</td>
                        <td>${item.grado ?? '-'}</td>
                        <td>
                            <span class="badge bg-${badge}">
                                ${item.estado?.toUpperCase() ?? "SIN MATRÍCULA"}
                            </span>
                        </td>
                        <td>
                            ${item.estado ? botonesEstado(item.estudiante_id) : "No aplica"}
                        </td>
                    </tr>
                `;
            });

            $("#tablaAdmin").html(html);
        }
    });
}


function botonesEstado(idEstudiante) {
    return `
        <button class="btn btn-success btn-sm cambiarEstado" data-id="${idEstudiante}" data-estado="aprobada">Aprobar</button>
        <button class="btn btn-danger btn-sm cambiarEstado" data-id="${idEstudiante}" data-estado="rechazada">Rechazar</button>
        <button class="btn btn-warning btn-sm cambiarEstado" data-id="${idEstudiante}" data-estado="pendiente">Pendiente</button>
    `;
}

function cargarDashboard() {

    $.ajax({
        url: "app/controllers/EncargadoController.php",
        method: "POST",
        success: function (data) {

            let html = "";

            if (data.length === 0) {
                html += `
                    <div class="alert alert-info">No tienes hijos registrados aún.</div>
                    <a href="index.php?page=crear_estudiante" class="btn btn-success mb-3">+ Agregar Estudiante</a>
                    <a href="app/views/logout.php" class="btn btn-danger">Cerrar sesión</a>
                `;
            }

            data.forEach(item => {

                let hijo = item.estudiante;
                let matricula = item.matricula;

                html += `
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        ${hijo.nombre}
                    </div>
                    <div class="card-body">
                `;

                if (!matricula) {

                    html += `
                        <h5 class="mb-3">Matricular</h5>

                        <form class="formMatricula">

                            <input type="hidden" name="action" value="crear">
                            <input type="hidden" name="estudiante_id" value="${hijo.id}">

                            <div class="mb-3">
                                <label>Período</label>
                                <select class="form-control" name="periodo" required>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Grado</label>
                                <select class="form-control" name="grado" required>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="1°">1°</option>
                                    <option value="2°">2°</option>
                                    <option value="3°">3°</option>
                                </select>
                            </div>

                            <button class="btn btn-success">Enviar Matrícula</button>
                        </form>
                    `;
                } else {

                    let badge = "secondary";
                    if (matricula.estado === "pendiente") badge = "warning";
                    if (matricula.estado === "aprobada") badge = "success";
                    if (matricula.estado === "rechazada") badge = "danger";

                    html += `
                        <h5 class="mb-3">Estado de Matrícula</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Período: </strong> ${matricula.periodo}</li>
                            <li class="list-group-item"><strong>Grado: </strong> ${matricula.grado}</li>
                            <li class="list-group-item">
                                <strong>Estado:</strong>
                                <span class="badge bg-${badge}">
                                    ${matricula.estado.toUpperCase()}
                                </span>
                            </li>
                        </ul>
                    `;
                }

                html += `</div></div>`;
            });

            $("#dashboardContainer").html(html);
        }
    });
}