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
    protected $with = ['autor', 'reu', 'vara', 'escritorio', 'natureza'];


    /**
     * Get the car's owner.
     */
    public function autor()
    {
        return $this->belongsTo(Cliente::class, 'autor', 'id');
    }

    /**
     * Get the car's owner.
     */
    public function reu()
    {
        return $this->belongsTo(Cliente::class, 'reu', 'id');
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
    public function escritorio()
    {
        return $this->belongsTo(Escritorio::class);
    }

    /**
     * Get the car's owner.
     */
    public function natureza()
    {
        return $this->belongsTo(Natureza::class);
    }

    /**
     * Get the car's owner.
     */
    public function audiencias()
    {
        return $this->hasMany(Audiencia::class, 'processo_id');
    }
}
