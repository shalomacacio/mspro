<?php

namespace App\Presenters;

use App\Transformers\AgendaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AgendaPresenter.
 *
 * @package namespace App\Presenters;
 */
class AgendaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AgendaTransformer();
    }
}
