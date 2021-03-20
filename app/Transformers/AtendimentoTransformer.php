<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Atendimento;

/**
 * Class AtendimentoTransformer.
 *
 * @package namespace App\Transformers;
 */
class AtendimentoTransformer extends TransformerAbstract
{
    /**
     * Transform the Atendimento entity.
     *
     * @param \App\Entities\Atendimento $model
     *
     * @return array
     */
    public function transform(Atendimento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
