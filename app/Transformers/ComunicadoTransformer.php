<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Comunicado;

/**
 * Class ComunicadoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ComunicadoTransformer extends TransformerAbstract
{
    /**
     * Transform the Comunicado entity.
     *
     * @param \App\Entities\Comunicado $model
     *
     * @return array
     */
    public function transform(Comunicado $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
