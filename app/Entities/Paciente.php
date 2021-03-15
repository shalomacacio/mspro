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

    ];

    public function ubs(){
        return $this->belongsTo(App\Entities\Ubs::class, 'ubs_id', 'id');
    }

}
