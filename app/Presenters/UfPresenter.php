<?php

namespace App\Presenters;

use App\Transformers\UfTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UfPresenter.
 *
 * @package namespace App\Presenters;
 */
class UfPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UfTransformer();
    }
}
