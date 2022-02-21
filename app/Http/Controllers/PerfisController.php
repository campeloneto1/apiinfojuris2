<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Perfil;
use App\Models\Log;


class PerfisController extends Controller
{
    public function get(){    
       	return Perfil::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Perfil::find($request->id);
    }

    public function post(Request $request){    
        $data = new Perfil;

        $data->nome = $request->nome;
        $data->administrador = $request->administrador ? $request->administrador : 0;
        $data->gestor = $request->gestor ? $request->gestor : 0;
        $data->relatorios = $request->relatorios ? $request->relatorios : 0;
     
        $data->key = bcrypt($request->nome);
      
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Perfil';
            $log->table = 'perfis';
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
       	$data = Perfil::find($request->id);
        $dataold = Perfil::find($request->id);

        $data->nome = $request->nome;
        $data->administrador = $request->administrador;
        $data->gestor = $request->gestor;
        $data->relatorios = $request->relatorios;
     
        $data->key = bcrypt($request->nome);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Perfil';
            $log->table = 'perfis';
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
       	$data = Perfil::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Perfil';
            $log->table = 'perfis';
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
