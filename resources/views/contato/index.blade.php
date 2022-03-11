@extends('layouts.master')
<!doctype html>
<head>
    <body>
</head>    
<html>
    <body>
        <div class="col-md-12">
            @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible" id="alertContatoCadastradoSucesso">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Sucesso </h4>
                    {{ Session::get('message') }} 
                </div>
            @endif
        </div>    
        <div class="container">
            <div class="tituloAplicacao">
                <h3>Listar Contatos</h3>

            </div>   
            <div class="row">
                <div class="col-sm-6">
                    {{csrf_field()}}
                    <a class="btn btn-primary btn-sm" href="{{ route('contato.create') }}" role="button">Incluir Contato</a>
                </div>
            </div>
 
        <br/>
        <table class="table table-striped table-sm table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefones</th>
                <th scope="col">Emails</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
         
            <tbody>
                @foreach($objContatos as $objContato)
                <tr>
                    <th scope="row">{{$objContato->id}}</th>
                    <td>{{$objContato->nome}}</td>
                    <td>
                        @foreach($objContato->telefones as $objTelefone)
                            <p> {{$objTelefone->telefone}} </p>
                        @endforeach
                    </td>
                    <td>
                        @foreach($objContato->emails as $objEmail)
                            <p> {{$objEmail->email}} </p>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('contato.show', ['id' =>  $objContato->id]) }}" class="btn btn-success btn-sm">Visualizar</a>
                        <a href="{{ route('contato.edit', ['id' =>  $objContato->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a onClick="deletarRegistro({{$objContato->id}})" class="btn btn-danger btn-sm">Deletar </a>
                    </td>    
                </tr>
                @endforeach
            </tbody>
        </table>    
    </body>
</html> 