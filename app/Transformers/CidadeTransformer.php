<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Cidade;

/**
 * Class CidadeTransformer.
 *
 * @package namespace App\Transformers;
 */
class CidadeTransformer extends TransformerAbstract
{
    /**
     * Transform the Cidade entity.
     *
     * @param \App\Entities\Cidade $model
     *
     * @return array
     */
    public function transform(Cidade $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
