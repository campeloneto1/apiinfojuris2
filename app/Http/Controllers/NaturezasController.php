<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Natureza;
use App\Models\Log;

class NaturezasController extends Controller
{
    public function get(){    
       	return Natureza::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Natureza::find($request->id);
    }

    public function post(Request $request){    
        $data = new Natureza;

        $data->nome = $request->nome;
     
        $data->key = bcrypt($request->nome);
      
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Natureza';
            $log->table = 'naturezas';
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
       	$data = Natureza::find($request->id);
        $dataold = Natureza::find($request->id);

        $data->nome = $request->nome;
     
        $data->key = bcrypt($request->nome);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Natureza';
            $log->table = 'naturezas';
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
       	$data = Natureza::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Natureza';
            $log->table = 'naturezas';
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
