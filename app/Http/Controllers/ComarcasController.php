<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Comarca;
use App\Models\Log;

class ComarcasController extends Controller
{
    public function get(){    
       	return Comarca::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Comarca::find($request->id);
    }

    public function where(Request $request){    
        return Comarca::where('tribunal_id', $request->id)->orderBy('nome')->get();
    }

    public function post(Request $request){    
        $data = new Comarca;

        $data->nome = $request->nome;
        $data->tribunal_id = $request->tribunal_id;

        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->email = $request->email;

        $data->obs = $request->obs;

        $data->pais_id = $request->pais_id ? $request->pais_id : 1;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cep = $request->cep;

        $data->key = bcrypt($request->tribunal_id.$request->nome);
      

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Comarca';
            $log->table = 'comarcas';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          return 1;
        }else{
          return 2;
        }
    }

    public function put(Request $request){    
       	$data = Comarca::find($request->id);
        $dataold = Comarca::find($request->id);

        $$data->nome = $request->nome ? $request->nome : $dataold->nome;
        $data->tribunal_id = $request->tribunal_id ? $request->tribunal_id : $dataold->tribunal_id;

        $data->telefone1 = $request->telefone1 ? $request->telefone1 : $dataold->telefone1;
        $data->telefone2 = $request->telefone2 ? $request->telefone2 : $dataold->telefone2;
        $data->email = $request->email ? $request->email : $dataold->email;

        $data->obs = $request->obs ? $request->obs : $dataold->obs;

        $data->pais_id = $request->pais_id ? $request->pais_id : $dataold->pais_id;
        $data->estado_id = $request->estado_id ? $request->estado_id : $dataold->estado_id;
        $data->cidade_id = $request->cidade_id ? $request->cidade_id : $dataold->cidade_id;
        $data->rua = $request->rua ? $request->rua : $dataold->rua;
        $data->numero = $request->numero ? $request->numero : $dataold->numero;
        $data->bairro = $request->bairro ? $request->bairro : $dataold->bairro;
        $data->complemento = $request->complemento ? $request->complemento : $dataold->complemento;
        $data->cep = $request->cep ? $request->cep : $dataold->cep;

        $data->key = bcrypt($request->tribunal_id.$request->nome);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma Comarca';
            $log->table = 'comarcas';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
          return 1;
        }else{
          return 2;
        }
    }

    public function delete(Request $request){    
       	$data = Comarca::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma Comarca';
            $log->table = 'comarcas';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }
}
