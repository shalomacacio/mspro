<?php

namespace App\Presenters;

use App\Transformers\ConvidadoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConvidadoPresenter.
 *
 * @package namespace App\Presenters;
 */
class ConvidadoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConvidadoTransformer();
    }
}
