

$(function(){

    $('#formulario').submit(function (e) { 
        $('#msgError').hide()

    
       var email = $('#email').val();
       var formularioValido = true;

       
       var password = $('#password').val();
       var repassword = $('#confirmPassword').val(); 

       let letras = "ABCDEFGHIJKLMNÑOPQRSTXYZ"
       for (let index = 0; index < letras.length; index++) {
           if(password.indexOf(letras.charAt(index)) != -1 ){
                formularioValido = true;
                break;
           }else{
               formularioValido = false;
               $('#msgError').text("No hay mayus")
           }
       }

       let tieneNumero = false;
       for(var i = 0; i < password.length; i++){
           if(password.charCodeAt(i) > 47 && password.charCodeAt(i) < 58){
                tieneNumero = true;
                break
           }
       }
       if(!tieneNumero){
           formularioValido = false;
           $('#msgError').text("No tiene numeros")

       }

       if(password.length < 7){
        $('#msgError').text("Contraseña menor de 7 digitos")
        formularioValido = false;
       }

       if(password != repassword){
           formularioValido = false;
       }

       let nombre = $('#nombre').val()
       if(password.includes(nombre)){
        $('#msgError').text("La contraseña no puede incluir el nombre")
           formularioValido = false;
       }

       var indice = email.indexOf("@");

       if(indice == -1){
           formularioValido = false;
           $('#msgError').text("Email no valido")
           $('#email').css('background-color', 'red');
       }

       


       if(!formularioValido){
           event.preventDefault();
           $('#msgError').show()

       }
   });

   $('#confirmPassword').on("change textinput input", function(){
    $('#confirmPassword').css('background-color', 'white');

    var password = $('#password').val();
    var repassword = $('#confirmPassword').val();

    if(password != repassword){
        $('#confirmPassword').css('background-color', 'red');
    }

   });


});