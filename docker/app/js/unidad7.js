document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("buscarPokemon").addEventListener("click", function () {
        let pokemon = document.getElementById("pokemon");
        let urlBase = "https://pokeapi.co/api/v2/";
        let endpoint = "pokemon/";
        if (pokemon.value != "") {
            fetch(urlBase + endpoint + pokemon.value)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("pokemonEncontrado").innerHTML = "<h3> " + data.name + "</h3><img src='" + data.sprites.front_default + "'>";
                    pokemon.value = "";
                })

        } else {
            alert("El pokemon es requerido")
        }
    });

    $("#buscarFrase").on("click", function () {
        let urlBase = "https://api.breakingbadquotes.xyz/v1/";
        let numero = $("#numero").val();
        let urlApi = numero == "" ? urlBase + "quotes" : urlBase + "quotes/" + numero;
        $.get(urlApi, function (data, status) {
            if (status == "success") {
                let contenido = "";
                data.forEach(value => {
                    contenido += "<h2>" + value.author + "</h2><p>" + value.quote + "</p>";
                })
                //console.log(contenido);
                $("#fraseEncontrado").html(contenido);
            }
        });
    });
})