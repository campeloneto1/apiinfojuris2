<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Estado;
use App\Models\Log;


class EstadosController extends Controller
{
    public function get(){    
       	return Estado::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Estado::find($request->id);
    }

    public function post(Request $request){    
        $data = new Estado;

        $data->nome = $request->nome;
        $data->pais_id = $request->pais_id;
        $data->uf = $request->uf;
      
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Estado';
            $log->table = 'estados';
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
       	$data = Estado::find($request->id);
        $dataold = Estado::find($request->id);

        $data->nome = $request->nome;
        $data->pais_id = $request->pais_id;
        $data->uf = $request->uf;

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Estado';
            $log->table = 'estados';
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
       	$data = Estado::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Estado';
            $log->table = 'estados';
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
