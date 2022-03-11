  
  $().ready(function(){
    $("#dadosContato").bind("invalid-form.validate",function(){
    }).validate(
      {
        errorElement:"el",
        errorPlacement: function(error,element){
            element.parent("div").children("div").html(error);
        },
        success: function (label){
          label.text("Ok!").removeClass("error").css("color", 'green');
        },
        submitHandler: function(form){
          form.submit();
        },
        rules:{
          'contato[nome]':{
            required:true
          },
          'contato[cep]':{
            required:true
          },
          'contato[endereco]':{
            required:true
          },
          'contato[bairro]':{
            required:true
          },
          'contato[cidade]':{
            required:true
          },
          'contato[estado]':{
            required:true
          },
          'contatoTelefone[0][tipo_telefone_id]':{
            required:true
          },
          'contatoTelefone[0][telefone]':{
            required:true
          },
          'contatoEmail[0][email]':{
            required:true
          },
  
        },
        messages:{
            'contato[nome]':{
                required:"Esse campo não pode ser vazio"
            },
            'contato[endereco]':{
                required:"Esse campo não pode ser vazio"
            },
            'contato[cidade]':{
                required:"Esse campo não pode ser vazio"
            },
            'contato[estado]':{
                required:"Esse campo não pode ser vazio"
            },
            'contato[bairro]':{
                required:"Esse campo não pode ser vazio"
            },
            'contato[cep]':{
                required:"Esse campo não pode ser vazio"
            },
            'contatoTelefone[0][tipo_telefone_id]':{
                required:"Esse campo não pode ser vazio"
            },
            'contatoTelefone[0][telefone]':{
                required:"Esse campo não pode ser vazio"
            },
            'contatoEmail[0][email]':{
                required:"Esse campo não pode ser vazio"
            },

  
        }
  
  
      }
  
    )
});    
    