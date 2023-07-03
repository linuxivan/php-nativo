function crear_juegos(id_div_padre, arrayJuegos)
{
    
    for(var i = 0; i < arrayJuegos.length; i++)
    {
        var juego = arrayJuegos[i];
        var htmlJuego = "<div class='juego'>";
        htmlJuego += "<img class='portadaJuego' src='"+juego.imagen+"'>";
        htmlJuego += "</div>";


        console.log(juego);
        $("#"+id_div_padre).append(htmlJuego);
    }
}

function crear_juego(id_div_padre, juego)
{
        var htmlJuego = "<div id='"+juego.id+"' class='juego'>";
        htmlJuego += "<img src='"+juego.imagen+"' alt='Portada "+juego.titulo+"' class='portadaJuego' />";
        htmlJuego += "<h3>"+juego.titulo+"</h3>";
        htmlJuego += "<p>";
        htmlJuego += juego.descripcion;
        htmlJuego += "Precio: <span>"+juego.precio+"€</span>";
        htmlJuego += "</p>";
        htmlJuego += "<div class='floatClear'></div>";
        htmlJuego += "</div>";


        console.log(juego);

    
        $("#"+id_div_padre).html(htmlJuego);
}


function cargar_juegos_select(id_div_padre, arrayJuegos)
{  
    
    
    for(var i = 0; i < arrayJuegos.length; i++)
    {
        var juego = arrayJuegos[i];
        var htmlJuego = "<option value='"+juego.id+"'>"+juego.titulo+"</option>";
                
        $('#'+id_div_padre).append($('<option>', {
            value: juego.id,
            text: juego.titulo
        }));
    }
}




$(function(){
    
    $('#generosSelect').on('change', function() {
        $('#juegosSelect').html("");

        let idGenero = this.value;
        var parametros = {function: "juegosGenero", id_genero: idGenero}
        $.ajax({
            data: parametros,
            url: 'http://localhost/juegalmi/servicios.php',
            method: 'post',
            dataType: 'JSON',
            success: function(response){
                console.log(response);
                cargar_juegos_select("juegosSelect", response);
            },
            error: function(error){
                console.log(error);
            },
        })
    
    });





    $('#cargarJuego').click(function(){

        let idJuego = $('#juegosSelect').val();
        var parametros = {function: "juego", id_juego: idJuego}

        $.ajax({
            data: parametros,
            url: 'http://localhost/juegalmi/servicios.php',
            method: 'post',
            dataType: 'JSON',
            success: function(response){
                console.log(response);
                crear_juego("juegos", response)
            },
            error: function(error){
                console.log(error);
            },
        })


        
    })
})