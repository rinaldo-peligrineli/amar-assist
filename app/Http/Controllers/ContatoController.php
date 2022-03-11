<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse ;
use Illuminate\Http\Request;

use App\Models\Contato;
use App\Models\ContatoEmail;
use App\Models\ContatoTelefone;
use App\Models\TipoTelefone;

class ContatoController extends Controller
{
    public function index() {
        try {  
            $objContatos = Contato::all(); 
            return view('contato.index', compact('objContatos'));
        } catch(\Exception $e) {
            return $e->getMessage();
        }            
    }
    
    public function show($id) {
        try { 
            $objContato = Contato::findOrFail($id);
            return view('contato.show', compact('objContato'));
        } catch(\Exception $e) {
            return $e->getMessage();
        }        
    }

    public function create() {
        try {
            $objTipoTelefone = TipoTelefone::all();
            return view('contato.create', compact('objTipoTelefone'));
        } catch(\Exception $e) {
            return $e->getMessage();
        }    
    }

    public function edit($id) {
        try {
            $objTipoTelefone = TipoTelefone::all();
            $objContato = Contato::findOrFail($id);
            
            return view('contato.edit')
                ->with(compact('objTipoTelefone'))
                ->with(compact('objContato'));

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    public function store(Request $request) {
        try {
            $contato = Contato::create($request->contato);
            
            $objTipoTelefone = TipoTelefone::all();
            $objContatos = Contato::all();

            foreach($request->contatoTelefone as $contatoTelefone) {
                $arrContatoTelefone = $contatoTelefone;
                $arrContatoTelefone['contato_id'] = $contato->id;
                $contatoTelefone = ContatoTelefone::create($arrContatoTelefone);
            }    
        
            foreach($request->contatoEmail as $contatoEmail) {
                $arrContatoEmail = $contatoEmail;
                $arrContatoEmail['contato_id'] = $contato->id;
                $contatoEmail = ContatoEmail::create($arrContatoEmail);
            }
          
           /* return view('contato.index')
                ->with(compact('objContatos'))
                ->with(compact('objTipoTelefone'))
                ->with('message',
                    "Contato {$contato->nome} criado com sucesso!"); */
            
                return redirect()->route('contato.index')->with('message',
                    "Contato {$contato->nome} incluido com sucesso!")
                    ->with(compact('objContatos'))
                    ->with(compact('objTipoTelefone'));            

        } catch(\Exception $e) {
            return response()->json(['data' => $e->getMessage()]);
        }   
        
    }

    public function update(Request $request) {

        try {
            $objTipoTelefone = TipoTelefone::all();

            $contatoId = $request->contato['id'];
            $nome = $request->contato['nome'];
            $endereco = $request->contato['endereco'];
            $bairro = $request->contato['bairro'];
            $cidade = $request->contato['cidade'];
            $estado = $request->contato['estado'];
            $cep = $request->contato['cep'];

            $objContato = Contato::find($contatoId);
            $objContato->nome = $nome;
            $objContato->endereco = $endereco;
            $objContato->bairro = $bairro;
            $objContato->cidade = $cidade;
            $objContato->estado = $estado;
            $objContato->cep = $cep;

            $objContato->save();
            /*return view('contato.edit')
                ->with(compact('objContato'))
                ->with(compact('objTipoTelefone'))
                ->with('message',
                "Contato {$objContato->nome} alterado com sucesso!"); **/
            
            return redirect()->route('contato.edit', ['id' => $contatoId])->with('message',
                "Contato {$objContato->nome} alterado com sucesso!")
                ->with(compact('objContato'))
                ->with(compact('objTipoTelefone'));    

        } catch(\Exception $e) {
            return response()->json(['data' => $e->getMessage()]);
        }         
    }

    public function destroy($id) {
        try {
            ContatoTelefone::where('contato_id', $id)->delete();
            ContatoEmail::where('contato_id', $id)->delete();
            Contato::where('id', $id)->delete();
            return response()->json(['data' => 'Contato excluido com sucesso.'], '200');
        } catch(\Exception $e) {
            return response()->json(['data' => 'Erro ao excluir o contato.'], '200');
        }    
    }
}
