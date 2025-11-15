$(function () {

    $("#btnLogin").on("click", function () {
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
        if (username === "" || password === "") {
            alert("Campos de usuario y clave son requeridos.");
            return false;
        }
        $("#formLogin").submit();
    })

});
