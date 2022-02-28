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
       	
        $user = Auth::user();
       
        if($user->perfil->administrador){
           return User::orderBy('nome')->get();
        }else{           
            return User::where('escritorio_id', $user->escritorio_id)->where('id', '<>', $user->id)->orderBy('id')->get();
        }
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
        $data->escritorio_id = $request->escritorio_id;
        $data->usuario = $request->cpf;
        $data->cpf = $request->cpf;
        $data->password = bcrypt($request->cpf);
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

         $data->nome = $request->nome ? $request->nome : $dataold->nome;
        $data->telefone1 = $request->telefone1 ? $request->telefone1 : $dataold->telefone1;
        $data->telefone2 = $request->telefone2 ? $request->telefone2 : $dataold->telefone2;
        $data->perfil_id = $request->perfil_id ? $request->perfil_id : $dataold->perfil_id;
        $data->escritorio_id = $request->escritorio_id ? $request->escritorio_id : $dataold->escritorio_id;
        $data->usuario = $request->cpf ? $request->cpf : $dataold->cpf;
        $data->cpf = $request->cpf ? $request->cpf : $dataold->cpf;
        $data->email = $request->email ? $request->email : $dataold->email;
        $data->pais_id = $request->pais_id ? $request->pais_id : $dataold->pais_id;
        $data->estado_id = $request->estado_id ? $request->estado_id : $dataold->estado_id;
        $data->cidade_id = $request->cidade_id ? $request->cidade_id : $dataold->cidade_id;
        $data->rua = $request->rua ? $request->rua : $dataold->rua;
        $data->numero = $request->numero ? $request->numero : $dataold->numero;
        $data->bairro = $request->bairro ? $request->bairro : $dataold->bairro;
        $data->complemento = $request->complemento ? $request->complemento : $dataold->complemento;
        $data->key = bcrypt($request->cpf ? $request->cpf : $dataold->cpf);

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
