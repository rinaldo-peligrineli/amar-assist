@extends('layouts.master')
<html>
    <head>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <body>
    <div class="col-md-12">
        
            @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible" id="alertContatoAlteradoSucesso">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Sucesso </h4>
                    {{ Session::get('message') }} 
                </div>
            @endif
        </div>    

        <div class="container">
        <div class="tituloAplicacao">
            <h3>Editar Contato</h3>
        </div>  
        
        <form id="dadosContato" action='{{ URL::route('contato.update') }}' method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="contato[nome]" id="contato[nome]" value="{{$objContato->nome}}">
                <input type="hidden" class="form-control" name="contato[id]" id="contato[id]" value="{{$objContato->id}}">
                <div style="color:red" class="error-messages"></div>
                {{csrf_field()}}
            </div>
            <div class="form-group">
                <label for="nome">Cep</label>
                <button class="btn btn-sm btn-warning" onClick="buscaCep()">Busca Cep</button>
                <input type="text" class="form-control" name="contato[cep]" id="contato[cep]" value="{{$objContato->cep}}">
                <div style="color:red" class="error-messages"></div>
            </div>

            <div class="form-group">
                <label for="nome">Endereco</label>
                <input type="text" class="form-control" name="contato[endereco]" id="contato[endereco]" value="{{$objContato->endereco}}">
                <div style="color:red" class="error-messages"></div>
            </div>

            <div class="form-group">
                <label for="nome">Cidade</label>
                <input type="text" class="form-control" name="contato[cidade]" id="contato[cidade]" value="{{$objContato->cidade}}">
                <div style="color:red" class="error-messages"></div>
            </div>

            <div class="form-group">
                <label for="nome">Estado</label>
                <input type="text" class="form-control" name="contato[estado]" id="contato[estado]" value="{{$objContato->estado}}">
                <div style="color:red" class="error-messages"></div>
            </div>

            <div class="form-group">
                <label for="nome">Bairro</label>
                <input type="text" class="form-control" name="contato[bairro]" id="contato[bairro]" value="{{$objContato->bairro}}">
                <div style="color:red" class="error-messages"></div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar Registro</button>
            
        </div>
          

        <h4 style="text-align:center">TELEFONES </h4>
        <div class="form-group">
            <table class="table table-striped table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Tipo Telefone</th>
                    <th scope="col">No. Telefone</th>
                    <th scope="col"><a onClick="openIncluirTelefone({{$objContato->id}})" class="btn btn-primary btn-sm">Incluir novo telefone </a></th>
                </tr>
            </thead>

                <tbody>

            @foreach($objContato->telefones as $key => $objTelefone)
                <tr> 
                    <td>
                        <select class="form-control" name="contatoTelefone[{{$key}}][tipo_telefone_id]" id="contatoTelefone[{{$key}}][tipo_telefone_id]">
                            <option value="">Selecione</option>
                                @foreach($objTipoTelefone as $objDado)
                                    <option value="{{$objDado->id}}" {{ (isset($objTelefone->tipoTelefone->id) && ($objTelefone->tipoTelefone->id == $objDado->id)) ? 'selected' : '' }}> {{$objDado->descricao_tipo}}</option>
                                @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="contatoTelefone[{{$key}}][telefone]" id="contatoTelefone[{{$key}}][telefone]" value="{{$objTelefone->telefone}}">
                    </td>
                    <td>
                        <a onClick="atualizarTelefone({{$objTelefone->id}}, {{$key}})" class="btn btn-warning btn-sm">Atualizar</a>
                        <a onClick="deletarTelefone({{$objTelefone->id}})" class="btn btn-danger btn-sm">Deletar </a>
                    </th>
                </tr>
            @endforeach
                </tbody>
            </table>    
        </div>

        <h4 style="text-align:center">EMAILS</h4>
        <div class="form-group">
            <table class="table table-striped table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">Email</th>
                    <th scope="col"><a onClick="openIncluirEmail({{$objContato->id}})" class="btn btn-primary btn-sm">Incluir novo email </a></th>
                </tr>
            </thead>

                <tbody>

            @foreach($objContato->emails as $key => $objEmail)
                <tr> 
                    <td>
                        <input type="text" class="form-control" name="contatoEmail[{{$key}}][email]" id="contatoEmail[{{$key}}][email]" value="{{$objEmail->email}}">
                    </td>

                    <td>
                        <a onClick="atualizarEmail({{$objEmail->id}}, {{$key}})" class="btn btn-warning btn-sm">Atualizar</a>
                        <a onClick="deletarEmail({{$objEmail->id}})" class="btn btn-danger btn-sm">Deletar </a>
                    </th>
                </tr>
            @endforeach
                </tbody>
            </table>  
            </form>    
        </div>
    </body>
</html>