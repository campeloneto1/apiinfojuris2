<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Log;


class UsuariosController extends Controller
{
    public function get(){    
       	return User::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return User::find($request->id);
    }

    public function post(Request $request){    
        $data = new User;

        $data->nome = $request->nome;
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->perfil_id = $request->perfil_id;
        $data->usuario = $request->cpf;
        $data->cpf = $request->cpf;
        $data->password = bcrypt('123456');
        $data->email = $request->email;
        $data->pais_id = $request->pais_id ? $request->pais_id : 1;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->key = bcrypt($request->cpf);
      

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Usuario';
            $log->table = 'usuarios';
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
       	$data = User::find($request->id);
        $dataold = User::find($request->id);

         $data->nome = $request->nome;
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->perfil_id = $request->perfil_id;
        $data->usuario = $request->cpf;
        $data->cpf = $request->cpf;
        $data->email = $request->email;
        $data->pais_id = $request->pais_id;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->key = bcrypt($request->cpf);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Usuario';
            $log->table = 'usuarios';
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
       	$data = User::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Usuario';
            $log->table = 'usuarios';
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
