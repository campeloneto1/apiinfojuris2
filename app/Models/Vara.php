<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vara extends Model
{
     use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'varas';

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
        'comarca_id',

        'pais_id',
        'estado_id',
        'cidade_id',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'cep',

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
    protected $with = ['comarca'];


    /**
     * Get the car's owner.
     */
    public function comarca()
    {
        return $this->belongsTo(Comarca::class);
    }

}
