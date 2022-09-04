$(document).ready(function () {
    $('#txtPassword').keyup(function () {
        $('#criteriop0').html(checkStrength($('#txtPassword').val()))
        $('#criteriop1').html(checkStrength($('#txtPassword').val()))
        $('#criteriop2').html(checkStrength($('#txtPassword').val()))
        $('#criteriop3').html(checkStrength($('#txtPassword').val()))
        $('#criteriop4').html(checkStrength($('#txtPassword').val()))
        
    })
 

    function checkStrength(password) {
       
        if (password.length > 7)
        {
            $('#criteriop0').removeClass()
            $('#criteriop0').addClass('Short')
        }else{
            $('#criteriop0').removeClass()
            $('#criteriop0').addClass('Strong')
        } 
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) 
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) 
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) 
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) 
        {

        }
        // Calculated strength value, we can return messages
        // If value is less than 2
       

      /*  -------------CRITERIOS JAVASCRIPT-----------*/
     
        
    }
 
});