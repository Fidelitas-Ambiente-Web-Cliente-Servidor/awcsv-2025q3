$(function () {
    const taskList = $("#task-list");
    const taskInput = $("#task-input");
    const addTaskBtn = $("#add-task");

    addTaskBtn.on("click", function () {
        const taskInput = taskInput.val().trim();
        if (taskInput === "") {
            alert("Campo de tarea es requerido.");
            return false;
        }
        $("#formTask").submit();
    })

    /*
    function loadTasks() {
        
    }

    function sendRequest(action, data) {

    }

    addTaskBtn.addEventListener("click", () => {

    });

    taskList.addEventListener("click", event => {
        
    });

    loadTasks();
    */
});
