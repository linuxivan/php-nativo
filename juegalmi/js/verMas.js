function cargarJuegos(arrayJuegos){


    for (let index = 0; index < arrayJuegos.length; index++) {
        var juego = arrayJuegos[index];

        var htmlJuego = "<div id='"+juego.id+"' class='juego'>";
        htmlJuego += "<img src='"+juego.imagen+"' alt='Portada "+juego.titulo+"' class='portadaJuego' />";
        htmlJuego += "<h3>"+juego.titulo+"</h3>";
        htmlJuego += "<p>";
        htmlJuego += juego.descripcion;
        htmlJuego += "Precio: <span>"+juego.precio+"€</span>";
        htmlJuego += "</p>";
        htmlJuego += "<div class='floatClear'></div>";
        htmlJuego += "</div>";

        $("#cuerpo").append(htmlJuego);

    }

    




}




$(function(){
    var cantJuegos = 5;
    var juegoActual= 6;
    $('#btnVerMas').click(function(){
        parametros = {function: "juegoLimit", desde: juegoActual, cant: cantJuegos}
        $.ajax({
            data: parametros,
            url: 'http://localhost/juegalmi/servicios.php',
            method: 'post',
            dataType: 'JSON',
            success: function(response){
                juegoActual += cantJuegos;

                cargarJuegos(response);
            },
            error: function(error){
                console.log(error);
            },
        })
    })
})