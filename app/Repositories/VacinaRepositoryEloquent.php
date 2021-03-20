<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VacinaRepository;
use App\Entities\Vacina;
use App\Validators\VacinaValidator;

/**
 * Class VacinaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VacinaRepositoryEloquent extends BaseRepository implements VacinaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vacina::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VacinaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
