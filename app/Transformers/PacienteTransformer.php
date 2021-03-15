<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Paciente;

/**
 * Class PacienteTransformer.
 *
 * @package namespace App\Transformers;
 */
class PacienteTransformer extends TransformerAbstract
{
    /**
     * Transform the Paciente entity.
     *
     * @param \App\Entities\Paciente $model
     *
     * @return array
     */
    public function transform(Paciente $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
