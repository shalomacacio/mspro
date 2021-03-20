<?php

namespace App\Presenters;

use App\Transformers\AtendimentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AtendimentoPresenter.
 *
 * @package namespace App\Presenters;
 */
class AtendimentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AtendimentoTransformer();
    }
}
