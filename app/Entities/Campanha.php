<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Campanha.
 *
 * @package namespace App\Entities;
 */
class Campanha extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'dt_inicio',
        'dt_fim',
        'ativa'
    ];

    protected $casts = [
        'ativa' => 'boolean',
    ];

    // public function agendas(){
    //     return $this->hasMany(Agenda::class);
    // }


}
