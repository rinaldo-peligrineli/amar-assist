<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contato;
use App\Models\ContatoTelefone;
use App\Models\TipoTelefone;

class ContatoTelefoneController extends Controller
{
        
    public function edit($id) {
        $objContatoTelefones = ContatoTelefone::findOrFail($id);
       
    }

    public function store(Request $request) {
        $objContato = Contato::find($request->id);
        $arrData['contato_id'] = $request->id;
        $arrData['tipo_telefone_id'] = $request->tipo_telefone_id;
        $arrData['telefone'] = $request->telefone;
       
        $contatoTelefone = ContatoTelefone::create($arrData);
        //return response()->json(['data' => 'Telefone para o Contato incluido com sucesso'], '200');
        return redirect()->route('contato.edit', ['id' => $objContato->id])->with('message',
        "Telefone {$contatoTelefone->telefone} para {$objContato->nome} incuido com sucesso!")
        ->with(compact('objContato'))
        ->with(compact('objTipoTelefone'));    
    }

    public function update(Request $request) {
        $objContatoTelefone = ContatoTelefone::find($request->id);
        $objContatoTelefone->telefone = $request->telefone;
        $objContatoTelefone->tipo_telefone_id = $request->tipo_telefone_id;
        $objContatoTelefone->save();
        return response()->json(['data' => 'Telefone atualizado com sucesso'], '200');

    }

    public function destroy($id) {
        ContatoTelefone::findOrFail($id)->delete();
        return response()->json(['data' => 'Telefone excluido com sucesso'], '200');
    }
}
