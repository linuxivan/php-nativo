$(function(){
  $('#Filtrar').click(function(){



    var textoFiltro = $('#filtro').val();
    

    var filtrarPor = $('#selectFiltro').val();

    let filtroOption;

    if (filtrarPor == "nombre") {
      filtroOption = 0;
    }else if(filtrarPor == "precio"){
      filtroOption = 4;
    }else if(filtrarPor == "compania"){
      filtroOption = 1;
    }

    $('#tablaRecomendaciones tr').each(function(){
      $(this).children("td").each(function(index){
        if (index == filtroOption) {
          var contenido = $(this).text();
          if (!contenido.includes(textoFiltro)) {
            $(this).closest("tr").hide();
          }else{
            $(this).closest("tr").show();
          }
        }
      })
    })
  })



  $('#VacialFiltro').click(function(){
    $('#filtro').val("");
  $('#tablaRecomendaciones tr').show();
  })





})
