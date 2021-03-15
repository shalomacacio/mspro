<?php

namespace App\Presenters;

use App\Transformers\PacienteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PacientePresenter.
 *
 * @package namespace App\Presenters;
 */
class PacientePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PacienteTransformer();
    }
}
