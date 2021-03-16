<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Agenda.
 *
 * @package namespace App\Entities;
 */
class Agenda extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'campanha_id',
        'paciente_id',
        'dh_agendamento'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function campanha(){
        return $this->belongsTo(Campanha::class);
    }

}
