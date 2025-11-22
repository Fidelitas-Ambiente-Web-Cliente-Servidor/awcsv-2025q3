$(function () {
    //let titulo = document.getElementById("titulo");
    $("#mensaje").hide();
    let selectorId = $("#titulo");
    $("main").prepend("<h4>Lista tareas</h4>");
    let selectoClase = $(".actividades");
    let selectorEtiqueta = $("p");
    let selectorHijosUL = $("ul > li");
    let selectorMultiselector = $("p , .formulario, #actividad");
    console.log(selectorId);
    console.log(selectoClase);
    console.log(selectorEtiqueta);
    console.log(selectorHijosUL);
    console.log(selectorMultiselector);

    $("p").css("color", "red");

    $("#titulo").text("Nuevo titulo");
    $("p").html("<h3>Nuevo P con h3</h3>");

    $("a").attr("href", "https://api.jquery.com/ready/");


    $("#agregarActividades").on("click", function () {
        let actividad = $("#actividad").val();
        if (actividad != "") {
            $("#mensaje").hide();
            $("#actividad").val("");
            $("#actividad").removeClass("error");
            $("#listaActividades").append("<li>" + actividad + "</li>")
        } else {
            $("#mensaje").show();
            $("#actividad").addClass("error");
        }
    });

    $("#logo").on("mouseover", function () {
        $("#logo").attr("src", "./img/logo-jquery.png");
    });
    $("#logo").on("mouseleave", function () {
        $("#logo").attr("src", "./img/fidelitas.png");
    })


    $("#ocultar").on("click", function () {
        $("#cuadrado").fadeOut(1000);
    })

    $("#mostrar").on("click", function () {
        $("#cuadrado").fadeIn(1000);
    })

    $("#disminuir").on("click", function () {
        $("#cuadrado").animate({
            width: '100px',
            height: '100px',
            opacity: 0.5
        });
    })

    $("#agrandar").on("click", function () {
        $("#cuadrado").animate({
            width: '500px',
            height: '500px',
            opacity: 1
        });
    })

    $("#cambiarColor").on("click", function () {
        $("#cuadrado").toggleClass("rosado");
    })
});

