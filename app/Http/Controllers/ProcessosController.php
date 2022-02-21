<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Processo;
use App\Models\Log;


class ProcessosController extends Controller
{
    public function get(){    
       	return Processo::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Processo::find($request->id);
    }

    public function post(Request $request){    
        $data = new Processo;

        $data->autor = $request->autor;
        $data->reu = $request->reu;
        $data->codigo = $request->codigo;
        $data->valor = $request->valor;

        $data->natureza_id = $request->natureza_id;
        $data->vara_id = $request->vara_id;
        $data->data = $request->data;

        $data->obs = $request->obs;
        $data->status = 1;

        $data->key = bcrypt($request->codigo);

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Processo';
            $log->table = 'processos';
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
       	$data = Processo::find($request->id);
        $dataold = Processo::find($request->id);

        $data->autor = $request->autor;
        $data->reu = $request->reu;
        $data->codigo = $request->codigo;
        $data->valor = $request->valor;

        $data->natureza_id = $request->natureza_id;
        $data->vara_id = $request->vara_id;
        $data->data = $request->data;

        $data->obs = $request->obs;
        $data->status = 1;

        $data->key = bcrypt($request->codigo);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Processo';
            $log->table = 'processos';
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
       	$data = Processo::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Processo';
            $log->table = 'processos';
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
