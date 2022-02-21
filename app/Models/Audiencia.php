<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
     use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audiencias';

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
        'processo_id',
        'data',
        'hora', 
        'tipo_id', 
        'link', 

        'pais_id',
        'estado_id',
        'cidade_id',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'cep',

        'status',
        'obs',
        'key',
              
        'created_by',
        'updated_by'
    ];

     /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['processo', 'pais', 'estado', 'cidade'];


    /**
     * Get the car's owner.
     */
    public function processo()
    {
        return $this->belongsTo(Processo::class);
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
