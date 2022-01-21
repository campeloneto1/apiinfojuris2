<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'processos';

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
        'autor',
        'reu',
        'codigo',
        'valor',
        'natureza_id',
        'vara_id',
        
        'data',   
        'obs',      
        'status', 
        'key',
              
        'created_by',
        'updated_by'
    ];

     /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['cliente', 'vara', 'audiencias'];


    /**
     * Get the car's owner.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Get the car's owner.
     */
    public function vara()
    {
        return $this->belongsTo(Vara::class);
    }

    /**
     * Get the car's owner.
     */
    public function audiencias()
    {
        return $this->hasMany(Audiencia::class, 'processo_id');
    }
}
