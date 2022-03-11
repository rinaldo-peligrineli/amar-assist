@extends('layouts.master')
<!doctype html>
<html>
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>

    </head>  
        <body>
        <div class="container">
        <div class="tituloAplicacao">
            <h3>Inserir Contato</h3>
        </div>   
        <form id="dadosContato" action='{{ URL::route('contato.store') }}'  method="post">
            
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="contato[nome]" id="contato[nome]" value="">
                    <input type="hidden" class="form-control" id="id" name="id" value="">
                    <div style="color:red" class="error-messages"></div>
                    
                    {{csrf_field()}}
                </div>
                
                <div class="form-group">
                    <label for="email">CEP</label>
                    <button class="btn btn-sm btn-warning" onClick="buscaCep()">Busca Cep</button>
                    <input type="text" class="form-control" name="contato[cep]" id="contato[cep]" value="">
                    <div style="color:red" class="error-messages"></div>
                </div>
                
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="contato[endereco]" id="contato[endereco]" value="">
                    <div style="color:red" class="error-messages"></div>
                </div>
                
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="contato[bairro]" id="contato[bairro]" value="">
                    <div style="color:red" class="error-messages"></div>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="contato[cidade]" id="contato[cidade]" value="">
                    <div style="color:red" class="error-messages"></div>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="contato[estado]" id="contato[estado]" value="">
                    <div style="color:red" class="error-messages"></div>
                </div>

                <div id="contatoTelefone" class="contatoTelefone" data-index="0">
                    <div class="form-group">
                        <label for="tipoTelefone">Tipo Telefone</label>
                        <button onClick="addTelefone()">+ Telefone </button>

                        <select class="form-control" name="contatoTelefone[0][tipo_telefone_id]" id="contatoTelefone[0][tipo_telefone_id]">
                            <option value="">Selecione</option>
                                @foreach($objTipoTelefone as $objDado)
                                    <option value="{{$objDado->id}}"> {{$objDado->descricao_tipo}}</option>
                                    
                                @endforeach
                        </select>
                        <div style="color:red" class="error-messages"></div>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="contatoTelefone[0][telefone]" id="contatoTelefone[0][telefone]" value="">
                        <div style="color:red" class="error-messages"></div>
                    </div>
                </div>

                <div id="contatoEmail" class="contatoEmail" data-index="0">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <button onClick="addEmail()">+ Email</button>
                        <input type="text" class="form-control" name="contatoEmail[0][email]" id="contatoEmail[0][email]" value="">
                        <div style="color:red" class="error-messages"></div>
                    </div>
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>    
            <span id="msg"></span>
    </body>
</html>  
 