<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Cliente;
use App\Models\Log;


class ClientesController extends Controller
{
     public function get(){    
       	return Cliente::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Cliente::find($request->id);
    }

    public function post(Request $request){    
        $data = new Cliente;

        $data->nome = $request->nome;
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->cpf = $request->cpf;
        $data->email = $request->email;
        $data->data_nascimento = $request->data_nascimento;
        $data->estado_civil = $request->estado_civil;
        $data->nacionalidade = $request->nacionalidade;

        $data->mae = $request->pai;
        $data->mae = $request->pai;

        $data->ocupacao_id = $request->ocupacao_id;
        $data->escritorio_id = $request->escritorio_id;


        $data->pais_id = $request->pais_id ? $request->pais_id : 1;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cep = $request->cep;

        $data->key = bcrypt($request->cpf);
      

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Cliente';
            $log->table = 'clientes';
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
       	$data = Cliente::find($request->id);
        $dataold = Cliente::find($request->id);

        $data->nome = $request->nome;
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->cpf = $request->cpf;
        $data->email = $request->email;
        $data->data_nascimento = $request->data_nascimento;
        $data->estado_civil = $request->estado_civil;
        $data->nacionalidade = $request->nacionalidade;

        $data->mae = $request->pai;
        $data->mae = $request->pai;

        $data->ocupacao_id = $request->ocupacao_id;
        $data->escritorio_id = $request->escritorio_id;


        $data->pais_id = $request->pais_id;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cep = $request->cep;

        $data->key = bcrypt($request->cpf);

       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Cliente';
            $log->table = 'clientes';
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
       	$data = Cliente::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Cliente';
            $log->table = 'clientes';
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
