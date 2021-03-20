<?php

namespace App\Presenters;

use App\Transformers\VacinaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VacinaPresenter.
 *
 * @package namespace App\Presenters;
 */
class VacinaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VacinaTransformer();
    }
}
