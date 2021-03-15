<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UfRepository;
use App\Entities\Uf;
use App\Validators\UfValidator;

/**
 * Class UfRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UfRepositoryEloquent extends BaseRepository implements UfRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Uf::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UfValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
