function redirect() {
    $('body').on('click', '.alert-confirm', function(evt) {
        window.location.reload = '/contato'; 
        //document.location.reload(true);
    });
}

function reload() {
      setTimeOut(document.location.reload(true), 500);
}

function addTelefone() {
    event.preventDefault();
    var dataIndex = parseInt($('.contatoTelefone').last().attr('data-index')) + 1;

    var div = $('<div>').attr('data-index', dataIndex).attr('id', 'contatoTelefone'+ dataIndex);
        $(div).append($('<div>').addClass('form-group')
        .append($('<div>').addClass('form-group')
        .append($('<label>')
            .attr('class', 'control-label')
            .html('Tipo Telefone')
        ).append($('<select>')
            .addClass('form-control required')
            .attr('id', 'contatoTelefone['+ dataIndex +'][tipo_telefone_id]')
            .attr('name', 'contatoTelefone['+ dataIndex +'][tipo_telefone_id]')
                .append($('<option>')
                    .val('')
                    .text('Selecione')            
                ).append($('<option>')
                    .val('1')
                    .text('Casa')            
                ).append($('<option>')
                    .val('2')
                    .text('Celular')            
                )        
            )
        ).append($('<div>')
            .append($('<label>')
                .attr('class', 'control-label')
                .html('Telefone')
            ).append($('<input>')
                .attr('type', 'text')
                .addClass('form-control')
                .attr('id', 'contatoTelefone['+ dataIndex +'][telefone]')
                .attr('name', 'contatoTelefone['+ dataIndex +'][telefone]')
            ).append($('<input>')
                .attr('type', 'hidden')
                .addClass('form-control input-sm required')
                .attr('id', 'contatoTelefone['+ dataIndex +'][telefone]')
                .attr('name', 'contatoTelefone['+ dataIndex +'][telefone]')
            )        
        )    
    );   

    $(div).insertAfter('.contatoTelefone:last');
}

function addEmail() {
    event.preventDefault();
    var dataIndex = parseInt($('.contatoEmail').last().attr('data-index')) + 1;

    var div = $('<div>').attr('data-index', dataIndex).attr('id', 'contatoEmail'+ dataIndex);
        $(div).append($('<div>').addClass('form-group')
            .append($('<div>')
                .append($('<label>')
                    .attr('class', 'control-label')
                    .html('Email')
                ).append($('<input>')
                    .attr('type', 'text')
                    .addClass('form-control')
                    .attr('id', 'contatoEmail['+ dataIndex +'][email]')
                    .attr('name', 'contatoEmail['+ dataIndex +'][email]')
                ).append($('<input>')
                    .attr('type', 'hidden')
                    .addClass('form-control input-sm')
                    .attr('id', 'contatoEmail['+ dataIndex +'][email]')
                    .attr('name', 'contatoEmail['+ dataIndex +'][email]')
                )        
            )    
    );   

    $(div).insertAfter('.contatoEmail:last');
}

function buscaCep() {
    event.preventDefault();
    var cep = $('#contato\\[cep\\]').val();
    console.log(cep);
    $.ajax({
        method: 'POST',
        url: 'https://viacep.com.br/ws/'+ cep +'/json/',
        dataType: 'jsonp',
        timeout: 8000,
        success: function (response) {
            console.log(response);
            $('#contato\\[endereco\\]').val(response.logradouro);
            $('#contato\\[cidade\\]').val(response.localidade);
            $('#contato\\[estado\\]').val(response.uf);
            $('#contato\\[bairro\\]').val(response.bairro);
            $('#contato\\[cep\\]').val(response.cep);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        },

    });
}


function deletarRegistro(contatoId){
    var token = $("input[name='_token']").val();
    
    fetch('/contato/delete/' + contatoId , {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'DELETE',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: contatoId,
               
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            redirect();  
        }).catch(function(error) {
            console.log(error);
            
    });
}

function atualizarContato(){
    var token = $("input[name='_token']").val();
    console.log($('#dadosContato').serialize());
    formData = $('#dadosContato').serialize();
   
    fetch('/contato/update', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify(formData)
        })
        .then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            redirect();  
            
        }).then(response => {
                            
        })
        .catch(function(error) {
            console.log('error');
    });
}

function atualizarTelefone(id, keyField){
    var token = $("input[name='_token']").val();
       
    fetch('/contato-telefone/update', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'put',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: id,
                telefone:  $('#contatoTelefone\\['+keyField+ '\\]\\[telefone\\]').val(),
                tipo_telefone_id: $('#contatoTelefone\\['+keyField+ '\\]\\[tipo_telefone_id\\]').val(),
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            redirect();  
            
        }).then(response => {
                            
        })
        .catch(function(error) {
            console.log(error);
    });
}

function openIncluirTelefone(contatoId) {
    $('#modal-add-telefone #idContato').val(contatoId);
    $('#modal-add-telefone').modal('show');
}

function cadastrarNovoTelefone() {
   
   var idContato = $('#idContato').val();
   var token = $("input[name='_token']").val();
  
   fetch('/contato-telefone/store', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: idContato,
                telefone:  $('#telefone').val(),
                tipo_telefone_id: $('#tipo_telefone_id').val(),
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            reload();  
        }).then(response => {
                            
        })
        .catch(function(error) {
            console.log(error);
    });

}

function deletarTelefone(id){
    var token = $("input[name='_token']").val();
    
    fetch('/contato-telefone/delete/' + id , {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'DELETE',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: id,
               
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            reload();  
        }).catch(function(error) {
            //console.log(error);
            
    });
}

function openIncluirEmail(contatoId) {
    $('#modal-add-email #idContatoEmail').val(contatoId);
    $('#modal-add-email').modal('show');
}

function cadastrarNovoEmail() {
   var idContato = $('#idContatoEmail').val();
   var token = $("input[name='_token']").val();
   
  
   fetch('/contato-email/store', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: idContato,
                email:  $('#email').val(),
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            reload();  
        }).then(response => {
                            
        })
        .catch(function(error) {
            console.log(error);
    });

}

function atualizarEmail(id, keyField){
    var token = $("input[name='_token']").val();
    console.log( keyField);
   
    fetch('/contato-email/update', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'put',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: id,
                email:  $('#contatoEmail\\['+ keyField + '\\]\\[email\\]').val(),
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            redirect();  
            
        }).then(response => {
                            
        })
        .catch(function(error) {
            console.log(error);
    });
}

function deletarEmail(id){
    var token = $("input[name='_token']").val();
    
    fetch('/contato-email/delete/' + id , {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'DELETE',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: id,
               
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            redirect();  
        }).catch(function(error) {
            //console.log(error);
            
    });
}