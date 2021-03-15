<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Comorbidade;

/**
 * Class ComorbidadeTransformer.
 *
 * @package namespace App\Transformers;
 */
class ComorbidadeTransformer extends TransformerAbstract
{
    /**
     * Transform the Comorbidade entity.
     *
     * @param \App\Entities\Comorbidade $model
     *
     * @return array
     */
    public function transform(Comorbidade $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
