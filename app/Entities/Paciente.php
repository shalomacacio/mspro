<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Paciente.
 *
 * @package namespace App\Entities;
 */
class Paciente extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cns',
        'nome',
        'nome_mae',
        'cpf',
        'dt_nascimento',
        'sexo',
        'celular',
        'email',
        'email_verified_at',
        'cep',
        'uf_id',
        'cidade_id',
        'bairro_id',
        'comp',
        'rua',
        'num',
        'ubs_id',
        'agente_saude',

    ];

    public function ubs(){
        return $this->belongsTo(Ubs::class, 'ubs_id', 'id');
    }

    public function bairro(){
        return $this->belongsTo( Bairro::class, 'bairro_id', 'id');
    }

    public function cidade(){
        return $this->belongsTo( Cidade::class, 'cidade_id', 'id');
    }

    public function comorbidades() {
        return $this->belongsToMany( Comorbidade::class );
    }

}
