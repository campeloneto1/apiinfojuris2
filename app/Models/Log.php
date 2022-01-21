<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'mensagem',
        'table',
        'fk',
        'action',
        'object',
        'object_old',
       
        'created_by',
        'updated_by'
    ];

     protected $with = ['usuario'];


     public function usuario()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
