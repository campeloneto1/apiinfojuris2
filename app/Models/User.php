<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'usuario',
        'password',
        'telefone1',
        'telefone2',
        'pais_id',
        'estado_id',
        'cidade_id',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'perfil_id',
        'escritorio_id',
        'key',

        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['perfil', 'escritorio'];


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
    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}
