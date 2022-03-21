<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Cidade;
use App\Models\Log;


class CidadesController extends Controller
{
    public function get(){    
       	return Cidade::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Cidade::find($request->id);
    }

    public function where(Request $request){    
        return Cidade::where('estado_id', $request->id)->orderBy('nome')->get();
    }

    public function post(Request $request){    
        $data = new Cidade;

        $data->nome = $request->nome;
        $data->estado_id = $request->estado_id;
      
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Cidade';
            $log->table = 'cidades';
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
       	$data = Cidade::find($request->id);
        $dataold = Cidade::find($request->id);

        $data->nome = $request->nome;
        $data->pais_id = $request->pais_id;
        $data->uf = $request->uf;

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma Cidade';
            $log->table = 'cidades';
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
       	$data = Cidade::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma Cidade';
            $log->table = 'cidades';
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
