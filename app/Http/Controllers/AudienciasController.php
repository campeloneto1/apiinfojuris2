<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Audiencia;
use App\Models\Log;

class AudienciasController extends Controller
{
    public function get(){    
       	return Audiencia::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Audiencia::find($request->id);
    }

    public function post(Request $request){    
        $data = new Audiencia;

        $data->processo_id = $request->processo_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->tipo_id = $request->tipo_id;

        $data->link = $request->link;

        $data->pais_id = $request->pais_id ? $request->pais_id : 1;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cep = $request->cep;

        $data->obs = $request->obs;

        $data->status = 1;

        $data->key = bcrypt($request->processo_id.$request->data.$request->hora);
      

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Audiencia';
            $log->table = 'audiencias';
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
       	$data = Audiencia::find($request->id);
        $dataold = Audiencia::find($request->id);

         $data->processo_id = $request->processo_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->tipo_id = $request->tipo_id;

        $data->link = $request->link;

        $data->pais_id = $request->pais_id;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cep = $request->cep;

        $data->obs = $request->obs;

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Audiencia';
            $log->table = 'audiencias';
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
       	$data = Audiencia::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Audiencia';
            $log->table = 'audiencias';
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
