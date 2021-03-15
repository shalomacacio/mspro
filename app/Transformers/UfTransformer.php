<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Uf;

/**
 * Class UfTransformer.
 *
 * @package namespace App\Transformers;
 */
class UfTransformer extends TransformerAbstract
{
    /**
     * Transform the Uf entity.
     *
     * @param \App\Entities\Uf $model
     *
     * @return array
     */
    public function transform(Uf $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
