<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Audiencia;
use App\Models\Log;
use Carbon\Carbon;

class AudienciasController extends Controller
{
    public function get(){    
        $user = Auth::user();       
        if($user->perfil->administrador){
            return Audiencia::orderBy('data', 'desc')->orderBy('hora', 'desc')->get();
        }else{        
            return Audiencia::whereHas('processo', function($query) use ($user){
                $query->where('escritorio_id', $user->escritorio_id);
            })->orderBy('data', 'desc')->orderBy('hora', 'desc')->get();
        }       	
    }

    public function find(Request $request){    
       	return Audiencia::find($request->id);
    }

    public function calendario(Request $request){  
        $user = Auth::user();    
        $date = Carbon::now(); 

        if($user->perfil->administrador){
           return Audiencia::select('data')->whereYear('data',$request->id2)->whereMonth('data',$request->id)->groupBy('data')->get();
        }else{        
            return Audiencia::select('data')->whereYear('data',$request->id2)->whereMonth('data',$request->id)->whereHas('processo', function($query) use ($user){
                $query->where('escritorio_id', $user->escritorio_id);
            })->groupBy('data')->get();
        }  
    }

    public function where(Request $request){ 
        $user = Auth::user();  

        if($user->perfil->administrador){
            return Audiencia::where('data', $request->id)->get();
        }else{        
            return Audiencia::where('data', $request->id)->whereHas('processo', function($query) use ($user){
                $query->where('escritorio_id', $user->escritorio_id);
            })->get();
        }          
        
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

         $data->processo_id = $request->processo_id ? $request->processo_id : $dataold->processo_id;
        $data->data = $request->data ? $request->data : $dataold->data;
        $data->hora = $request->hora ? $request->hora : $dataold->hora;
        $data->tipo_id = $request->tipo_id ? $request->tipo_id : $dataold->tipo_id;

        $data->link = $request->link ? $request->link : $dataold->link;

        $data->pais_id = $request->pais_id ? $request->pais_id : $dataold->pais_id;
        $data->estado_id = $request->estado_id ? $request->estado_id : $dataold->estado_id;
        $data->cidade_id = $request->cidade_id ? $request->cidade_id : $dataold->cidade_id;
        $data->rua = $request->rua ? $request->rua : $dataold->rua;
        $data->numero = $request->numero ? $request->numero : $dataold->numero;
        $data->bairro = $request->bairro ? $request->bairro : $dataold->bairro;
        $data->complemento = $request->complemento ? $request->complemento : $dataold->complemento;
        $data->cep = $request->cep ? $request->cep : $dataold->cep;

        $data->obs = $request->obs ? $request->obs : $dataold->obs;

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
