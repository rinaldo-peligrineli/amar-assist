<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contato;
use App\Models\ContatoEmail;
use App\Models\TipoTelefone;

class ContatoEmailController extends Controller
{
   
    public function store(Request $request) {
        $objTipoTelefone = TipoTelefone::all();
        $objContato = Contato::find($request->id);
        $arrData['contato_id'] = $request->id;
        $arrData['email'] = $request->email;
        
        $contatoEmail = ContatoEmail::create($arrData);

        return redirect()->route('contato.edit', ['id' => $objContato->id])->with('message',
        "Email {$contatoEmail->email} para {$objContato->nome} incuido com sucesso!")
        ->with(compact('objContato'))
        ->with(compact('objTipoTelefone'));    
    }

    
    public function update(Request $request) {
        $objContatoEmail = ContatoEmail::find($request->id);
        $objContatoEmail->email = $request->email;
        $objContatoEmail->save();
        return response()->json(['data' => 'Email atualizado com sucesso'], '200');

    }

    public function destroy($id) {
        ContatoEmail::findOrFail($id)->delete();
        return response()->json(['data' => 'Email excluido com sucesso'], '200');
    }
}
