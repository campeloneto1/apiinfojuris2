<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Vara;
use App\Models\Log;

class VarasController extends Controller
{
    public function get(){    
       	return Vara::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Vara::find($request->id);
    }

    public function where(Request $request){    
        return Vara::where('comarca_id', $request->id)->orderBy('nome')->get();
    }

    public function post(Request $request){    
        $data = new Vara;

        $data->nome = $request->nome;
        $data->comarca_id = $request->comarca_id;

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

        $data->key = bcrypt($request->nome);
      

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Vara';
            $log->table = 'varas';
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
       	$data = Vara::find($request->id);
        $dataold = Vara::find($request->id);

        $$data->nome = $request->nome ? $request->nome : $dataold->nome;
        $data->comarca_id = $request->comarca_id ? $request->comarca_id : $dataold->comarca_id;

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

        $data->key = bcrypt($request->nome);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma Vara';
            $log->table = 'varas';
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
       	$data = Vara::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma Vara';
            $log->table = 'varas';
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
