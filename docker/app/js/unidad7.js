document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("buscarPokemon").addEventListener("click", function () {
        let pokemon = document.getElementById("pokemon").value;
        let urlBase = "https://pokeapi.co/api/v2/";
        if (pokemon != "") {
            fetch(urlBase + "/pokemon/" + pokemon)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById("pokemonEncontrado").innerHTML = "<h3> " + data.species.name + "</h3><img src='" + data.sprites.front_default + "'>";
                })
                .catch(error => console.error(error))
            document.getElementById("pokemon").value = "";
        }
    });

    $("#buscarFrase").click(function () {
        let urlBase = "https://api.breakingbadquotes.xyz/v1/";
        let numero = $("#numero").val();
        let urlApi = numero == "" ? urlBase + "quotes" : urlBase + "quotes/" + numero;
        console.log(urlApi);
        $.get(urlApi, function (data, status) {
            console.log(data)
            console.log("\nStatus: " + status);
            if (status == "success") {
                let contenido = "";
                data.forEach(value => {
                    contenido += "<h2>" + value.author + "</h2><p>" + value.quote + "</p>";
                })

                $("#fraseEncontrado").html(contenido);
            }

        });
    });

})