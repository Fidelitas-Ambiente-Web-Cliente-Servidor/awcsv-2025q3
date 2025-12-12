$(function () {

    $("#btnLogin").on("click", function () {
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
        if (username === "" || password === "") {
            alert("Campos de usuario y clave son requeridos.");
            return false;
        }

        $.post("app/controllers/UserController.php",
            {
                username: username,
                password: password,
                action: "login"
            },
            function (data, status) {
                if (data.response == "1") {
                    window.location = "index.php"
                } else {
                    alert("Error de sesion")
                }
            });

    })

});
