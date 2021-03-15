<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Campanha;

/**
 * Class CampanhaTransformer.
 *
 * @package namespace App\Transformers;
 */
class CampanhaTransformer extends TransformerAbstract
{
    /**
     * Transform the Campanha entity.
     *
     * @param \App\Entities\Campanha $model
     *
     * @return array
     */
    public function transform(Campanha $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
