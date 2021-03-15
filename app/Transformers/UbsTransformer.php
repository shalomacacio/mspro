<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Ubs;

/**
 * Class UbsTransformer.
 *
 * @package namespace App\Transformers;
 */
class UbsTransformer extends TransformerAbstract
{
    /**
     * Transform the Ubs entity.
     *
     * @param \App\Entities\Ubs $model
     *
     * @return array
     */
    public function transform(Ubs $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
