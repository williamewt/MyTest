$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$('#input-name').on('blur', function(){
    if($(this).val() != ''){
        $('#form-name').addClass('has-success');
    }else{
        $('#form-name').removeClass('has-success');
    }          
});

$('#input-email').on('blur', function(){
    var email = $(this);
    var div   = $('#form-email');
    var label = $('#label-email');
    validEmailAddress(email, div, label);            
});

$('#input-user').on('blur', function(){
    var user = $(this);
    var div   = $('#form-user');
    var label = $('#label-user');

    label.text('Usuário*');
    div.removeClass('has-error');
    div.removeClass('has-success');
    if(user.val() != ''){
        var validate = validateField('user', user.val());

        console.log(validate);

        if(validate){
            label.text('Usuário disponível');                
            div.addClass('has-success');
        }else{
            label.text('Usuário indisponível');                
            div.addClass('has-error');
            user.focus();
        } 
    } 
    
});

$('#input-password').on('blur', function(){
    var password = $(this);
    var div   = $('#form-password');
    var label = $('#label-password');
    validatePassword(password, div, label);            
});

$('#input-password-confirm').on('keyup', function(){            
    var password = $("#input-password");
    var confirm_password = $("#input-password-confirm");
    var div = $("#form-password-confirm");
    var label = $("#label-password-confirm");

    confirmPassword(password, confirm_password, div, label);

});

function validEmailAddress(email, div, label) {
    label.text('E-mail*');
    div.removeClass('has-error');
    div.removeClass('has-success');
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    if(!pattern.test(email.val()) && email.val() != ''){
        label.text('E-mail inválido!');
        div.addClass('has-error');
        email.focus();
    }else if(email.val() != ''){                
        var validate = validateField('email', email.val());
        console.log(validate);

        if(validate){
            label.text('E-mail válido');                
            div.addClass('has-success');
        }else{
            label.text('E-mail já cadastrado');                
            div.addClass('has-error');
            email.focus();
        } 
        
    }
};

function validateField(field, fieldValue){
    var result;
    $.ajax({
        url: '../back/validateField.php',
        type: 'POST',
        data: 'field=' + field + '&fieldValue=' + fieldValue,
        dataType: 'json',
        async: false,
        success: function(data){
            console.log(data);
            if(data.validate === 0){
                result = false;
            }else{
                result = true;
            }                        
        }
    });

    return result;
}

function validatePassword(password, div, label){            
    label.text('Senha*');
    div.removeClass('has-error');
    div.removeClass('has-success');           
    var pattern = new RegExp(/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d!@#$%&*()-_+=]{6,}$/);            
    if(!pattern.test(password.val()) && password.val() != ''){
        label.text('Senha inválida');
        div.addClass('has-error');
        password.focus();
    }else if(password.val() != ''){
        label.text('Senha*');
        div.addClass('has-success');
    }
}  

function confirmPassword(password, confirm_password, div, label){
        label.text('Confirme a senha*');
        div.removeClass('has-success');
        div.removeClass('has-error');
    if(password.val() != confirm_password.val()) {
            label.text('Senhas diferentes!');
        div.addClass('has-error');
        $('#btnSubmit').prop('disabled', true); 
    } else {
        label.text('Senha confirmada');
        div.addClass('has-success');

        var preenchidos = true;
        $('input').each(function () {
            if (!this.value) {
                preenchidos = false;
                return false;
            }
        });
        $('#btnSubmit').prop('disabled', !preenchidos); 
    }
}


var inputs = $('input');

inputs.on('keyup', verificarInputs);


function verificarInputs() {
    var preenchidos = true;
    inputs.each(function () {
        if (!this.value) {          
          $('#btnSubmit').prop('disabled', true);
          return false;
        }
    });
          
}



$('#formCreateAccount').on('submit', function(e){
    e.preventDefault();
    var dados = $(this).serialize();

    if($("#input-password").val() != $("#input-password-confirm").val()) {
        return false;
    }
    
     $.ajax({
        url: '../back/criarconta.php',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function(data){            
            if(data.success === 1){
                alert(data.msg);
                $(location).attr('href', '../entrar.html');
            }else{
                alert(data.msg);
            }
        },
        beforeSend: function(){
            $('#btnSubmit').button('loading');
        },
        complete: function(){
            $('#btnSubmit').button('reset');
        }
    });
    return false;
});