<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Bairro;

/**
 * Class BairroTransformer.
 *
 * @package namespace App\Transformers;
 */
class BairroTransformer extends TransformerAbstract
{
    /**
     * Transform the Bairro entity.
     *
     * @param \App\Entities\Bairro $model
     *
     * @return array
     */
    public function transform(Bairro $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
