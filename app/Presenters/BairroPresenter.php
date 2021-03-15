<?php

namespace App\Presenters;

use App\Transformers\BairroTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BairroPresenter.
 *
 * @package namespace App\Presenters;
 */
class BairroPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BairroTransformer();
    }
}
