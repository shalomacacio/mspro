<?php

namespace App\Presenters;

use App\Transformers\ComunicadoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComunicadoPresenter.
 *
 * @package namespace App\Presenters;
 */
class ComunicadoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComunicadoTransformer();
    }
}
