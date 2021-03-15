<?php

namespace App\Presenters;

use App\Transformers\UbsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UbsPresenter.
 *
 * @package namespace App\Presenters;
 */
class UbsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UbsTransformer();
    }
}
