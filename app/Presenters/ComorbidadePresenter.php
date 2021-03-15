<?php

namespace App\Presenters;

use App\Transformers\ComorbidadeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComorbidadePresenter.
 *
 * @package namespace App\Presenters;
 */
class ComorbidadePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComorbidadeTransformer();
    }
}
