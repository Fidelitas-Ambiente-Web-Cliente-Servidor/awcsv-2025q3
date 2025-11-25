$(function () {
    const taskList = $("#task-list");
    const taskInput = $("#task-input");
    const addTaskBtn = $("#add-task");

    addTaskBtn.on("click", function () {
        const task = taskInput.val().trim();
        if (task === "") {
            alert("Campo de tarea es requerido.");
            return false;
        }
        //$("#formTask").submit();
        $.post('app/controllers/TaskController.php',
            {
                action: "add",
                tarea: task
            }, function (data, status) {
                if (data.response == 1) {
                    taskList.html("")
                    loadTasks();
                    taskInput.val("")
                }
            });
    })

    $(document).on("click", ".list-tareas", function () {
        let idTarea = $(this).data('tarea');
        $.post('app/controllers/TaskController.php',
            {
                action: "delete",
                id: idTarea
            }, function (data, status) {
                taskList.html("")
                loadTasks();
            });
    })


    function loadTasks() {
        $.post('app/controllers/TaskController.php',
            {
                action: "all"
            }, function (data, status) {
                data.forEach(task => {
                    taskList.append(" <li class='list-group-item d-flex justify-content-between align-items-center list-tareas' data-tarea='" + task.id + "' >" + task.descripcion + "<a id='delete' class='btn btn-danger btn-sm'>ELIMINAR</a>")
                })
            });
    }


    loadTasks();

});
