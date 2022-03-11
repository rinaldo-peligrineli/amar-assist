@extends('layouts.master')
<html>
    <head>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <body>
        <div class="container">
        <div class="tituloAplicacao">
            <h3>Visualisar Contato</h3>
        </div>  
            
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" value="{{$objContato->nome}}" readonly>
        </div>

        <div class="form-group">
            <label for="nome">Endereco</label>
            <input type="text" class="form-control" id="nome" value="{{$objContato->endereco}}" readonly>
        </div>

        <div class="form-group">
            <label for="nome">Cidade</label>
            <input type="text" class="form-control" id="nome" value="{{$objContato->cidade}}" readonly>
        </div>

        <div class="form-group">
            <label for="nome">Estado</label>
            <input type="text" class="form-control" id="nome" value="{{$objContato->estado}}" readonly>
        </div>

        <div class="form-group">
            <label for="nome">Bairro</label>
            <input type="text" class="form-control" id="nome" value="{{$objContato->bairro}}" readonly>
        </div>

        <div class="form-group">
            <label for="nome">Cep</label>
            <input type="text" class="form-control" id="nome" value="{{$objContato->cep}}" readonly>
        </div>
        <h4 style="text-align:center">TELEFONES </h4>
        <div class="form-group">
            <table class="table table-striped table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Tipo Telefone</th>
                    <th scope="col">No. Telefone</th>
                </tr>
            </thead>

                <tbody>

            @foreach($objContato->telefones as $objTelefone)
                <tr> 
                    <td>{{$objTelefone->tipoTelefone->descricao_tipo}}</td>
                    <td>{{$objTelefone->telefone}}</td>
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
                </tr>
            </thead>

                <tbody>

            @foreach($objContato->emails as $objEmail)
                <tr> 
                    <td>{{$objEmail->email}}</td>
                </tr>
            @endforeach
                </tbody>
            </table>    
        </div>
    </body>
</html>