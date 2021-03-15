<?php

namespace App\Presenters;

use App\Transformers\CidadeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CidadePresenter.
 *
 * @package namespace App\Presenters;
 */
class CidadePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CidadeTransformer();
    }
}
