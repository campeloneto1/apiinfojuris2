<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comarca extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comarcas';

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
        'tribunal_id',

        'pais_id',
        'estado_id',
        'cidade_id',
        'bairro',
        'rua',
        'numero',
        'complemento',  
        'cep',

        'key',
              
        'created_by',
        'updated_by'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['tribunal'];


    /**
     * Get the car's owner.
     */
    public function tribunal()
    {
        return $this->belongsTo(Tribunal::class);
    }
}
