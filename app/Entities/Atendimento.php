<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Atendimento.
 *
 * @package namespace App\Entities;
 */
class Atendimento extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'paciente_id',
        'vacina_id',
        'agenda_id',
        'concluido',
        'obs'
    ];

}