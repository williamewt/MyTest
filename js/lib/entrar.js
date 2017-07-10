$('#formLogin').on('submit', function(){
    var dados = $(this).serialize();

    if($('#input-user').val() == '' || $('#input-password').val() == '') {
        alert('Preencha os campos corretamente!');
        return false;
    }
    $('#alert-div').removeClass('alert-warning');
    $('#alert-div').removeClass('alert-danger');
    $('#alert-div').addClass('hidden');      
    
     $.ajax({
        url: '../back/entrar.php',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function(data){ 
            console.log(data);           
            if(data.success === 1){
                $(location).attr('href', '../perfil');
            }else{
                $('#alert-div').addClass(data.alert);
                $('#alert-msg').html(data.msg);
                $('#alert-div').removeClass('hidden');
            }
        },
        error:function(exception){
            alert('Exeption: '+exception);
        },
        beforeSend: function(){
            $('#btnDoLogin').button('loading');
        },
        complete: function(){
            $('#btnDoLogin').button('reset');
        }
    });
    return false;
});


function sendEmailConfirm(id){
    $('#alert-div').addClass('hidden');
    $('#alert-div').removeClass('alert-warning');
    $('#alert-div').removeClass('alert-danger');    
    $.ajax({
        url: '../back/sendemailconfirm.php',
        type: 'POST',
        data: 'id=' + id,
        dataType: 'json',
        success: function(data){ 
            console.log(data);
            if(data.success === 1){
                $('#alert-div').addClass(data.alert);
                $('#alert-msg').html(data.msg);
                $('#alert-div').removeClass('hidden');    
            }else{
                $('#alert-div').addClass('alert-warning');
                $('#alert-div').removeClass('hidden'); 
            }
        },
        error:function(exception){
            alert('Exeption: '+exception);
        },
        beforeSend: function(){
            $('#spinner').removeClass('hidden');
        },
        complete: function(){
            $('#spinner').addClass('hidden');
        }
    });
    return false;
}