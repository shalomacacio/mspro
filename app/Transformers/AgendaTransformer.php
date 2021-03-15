<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Agenda;

/**
 * Class AgendaTransformer.
 *
 * @package namespace App\Transformers;
 */
class AgendaTransformer extends TransformerAbstract
{
    /**
     * Transform the Agenda entity.
     *
     * @param \App\Entities\Agenda $model
     *
     * @return array
     */
    public function transform(Agenda $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
