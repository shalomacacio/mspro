<?php

namespace App\Presenters;

use App\Transformers\CampanhaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CampanhaPresenter.
 *
 * @package namespace App\Presenters;
 */
class CampanhaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CampanhaTransformer();
    }
}
