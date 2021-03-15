<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ComunicadoRepository;
use App\Entities\Comunicado;
use App\Validators\ComunicadoValidator;

/**
 * Class ComunicadoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ComunicadoRepositoryEloquent extends BaseRepository implements ComunicadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comunicado::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ComunicadoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
