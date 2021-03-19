<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Convidado;

/**
 * Class ConvidadoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ConvidadoTransformer extends TransformerAbstract
{
    /**
     * Transform the Convidado entity.
     *
     * @param \App\Entities\Convidado $model
     *
     * @return array
     */
    public function transform(Convidado $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
