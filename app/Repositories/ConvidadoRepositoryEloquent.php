<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConvidadoRepository;
use App\Entities\Convidado;
use App\Validators\ConvidadoValidator;

/**
 * Class ConvidadoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConvidadoRepositoryEloquent extends BaseRepository implements ConvidadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Convidado::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ConvidadoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
