<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Vacina;

/**
 * Class VacinaTransformer.
 *
 * @package namespace App\Transformers;
 */
class VacinaTransformer extends TransformerAbstract
{
    /**
     * Transform the Vacina entity.
     *
     * @param \App\Entities\Vacina $model
     *
     * @return array
     */
    public function transform(Vacina $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
