//document.getElementById("titulo").innerText = "Unidad 3";
$(function () {
    $("#mensaje").hide();
    $("#titulo");
    let mensaje = $("#mensaje");
    console.log($("#titulo"));
    console.log(mensaje);

    let actividades = $(".actividades");
    console.log(actividades);
    let sections = $("input");
    console.log(sections);

    let listaLi = $("#listaActividades > li");
    console.log(listaLi);


    let multiselecciones = $("#listaActividades, li, .actividades");
    console.log(multiselecciones);

    $("#logo").on("mouseover", function () {
        $("#logo").attr("src", "./img/logo-jquery.png");
    })


    $("#logo").on("mouseleave", function () {
        $("#logo").attr("src", "./img/fidelitas.png");
    })

    $("#agregarActividades").on("click", function () {
        let actividad = $("#actividad");
        if (actividad.val() == "") {
            $("#mensaje").show();
            actividad.removeClass("neutral");
            actividad.addClass("error");
        } else {
            $("#mensaje").hide();
            actividad.removeClass("error");
            actividad.addClass("neutral");
        }
    })

    $("#actividad").on("keypress", function () {
        console.log("Handler for `keypress` called.");
    });

    $("#titulo").text("Unidad 3"); // -> document.getElementById("titulo").innerText = "Unidad 3";
    $("p").html("<h3> Agregue en el p un h3</h3>");
    $("p").css("color", "blue");

});
