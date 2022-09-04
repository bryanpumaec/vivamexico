$(function(){

    $(document).on('keyup','#txtPassword, #txtPassword2',function(){
      var foo = $('#txtPassword').val().trim();
      var bar = $('#txtPassword2').val().trim();
      if( !foo || !bar || foo == '' || bar == '' ){
        $('#poo').removeClass('text-success').addClass('text-danger').text('Las contraseñas no coinciden');
      }
      
      else{
        if( foo !== bar ){
          $('#poo').removeClass('text-success').addClass('text-danger').text('Las contraseñas no coinciden');
        }
        
        else{
        $('#poo').removeClass('text-danger').addClass('text-success').text('Las contraseñas si coinciden');
        }
      }
    });
  });