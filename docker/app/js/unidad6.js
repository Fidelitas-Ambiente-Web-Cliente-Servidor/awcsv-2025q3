/*
document.getElementById("titulo").innerText = "Unidad 3";
$("#titulo"); //id
$(".clase"); // class
$("p"); // etiqueta
$("ul > li"); // padre
$("p, #titulo, .clase"); // multiple elementos
*/
$(function () {
    $("#mensaje").hide();
    console.log(document.getElementById("titulo"));
    $("#titulo").text("Nuevo titulo");
    $("p").html("<h3>Nuevo P con h3</h3>");
    $("li").css("color", "red");
    $("a").attr("href", "https://fidelitasvirtual.org");

    $(".formulario").prepend("<h2>Registrese</h2>");

    console.log($("#titulo"));
    console.log($("input"));

    console.log($("input, h1"));
    console.log($("ul > li"));

    $("#logo").on("mouseover", function () {
        $("#logo").attr("src", "./img/logo-jquery.png");
    })


    $("#logo").on("mouseleave", function () {
        $("#logo").attr("src", "./img/fidelitas.png");
    })

    $("#agregarActividades").on("click", function () {
        let actividad = $("#actividad").val();
        if (actividad != "") {
            $("#mensaje").hide();
            $("#actividad").val("");
            $("#actividad").addClass("neutral");
            $("#actividad").removeClass("error");
            $("#listaActividades").prepend("<li>" + actividad + "</li>")
        } else {
            $("#mensaje").show();
            $("#actividad").addClass("error");
            $("#actividad").removeClass("neutral");
        }
        console.log(actividad);
    });

    $("#ocultar").on("click", function () {
        $("#cuadrado").fadeOut(1000);
    })

    $("#cambiarColor").on("click", function () {
        $("#cuadrado").toggleClass("rosado");
    })

    $("#mostrar").on("click", function () {
        $("#cuadrado").fadeIn(1000);
    })

    $("#agrandar").on("click", function () {
        $("#cuadrado").animate({
            width: '500px',
            height: '500px',
            opacity: 1
        });
    })

    $("#disminuir").on("click", function () {
        $("#cuadrado").animate({
            width: '100px',
            height: '100px',
            opacity: 0.5
        });
    })
});










