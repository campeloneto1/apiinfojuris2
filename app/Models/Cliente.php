<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clientes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'email',
        'telefone1',
        'telefone2',
        'data_nascimento',
        'estado_civil',
        'nacionalidade',
        'ocupacao_id',

        'pais_id',
        'estado_id',
        'cidade_id',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'cep',
        
        'escritorio_id',
        'tipo',
        'key',
 
        'created_by',
        'updated_by'
    ];

     /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['escritorio', 'processos', 'pais', 'estado', 'cidade'];


    /**
     * Get the car's owner.
     */
    public function processos()
    {
        return $this->hasMany(Processo::class, 'cliente_id');
    }

    /**
     * Get the car's owner.
     */
    public function escritorio()
    {
        return $this->belongsTo(Escritorio::class);
    }

    /**
     * Get the car's owner.
     */
    public function ocupacao()
    {
        return $this->belongsTo(Ocupacao::class);
    }

    /**
     * Get the car's owner.
     */
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    /**
     * Get the car's owner.
     */
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    /**
     * Get the car's owner.
     */
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
