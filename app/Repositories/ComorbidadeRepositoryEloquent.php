<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ComorbidadeRepository;
use App\Entities\Comorbidade;
use App\Validators\ComorbidadeValidator;

/**
 * Class ComorbidadeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ComorbidadeRepositoryEloquent extends BaseRepository implements ComorbidadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comorbidade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ComorbidadeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
