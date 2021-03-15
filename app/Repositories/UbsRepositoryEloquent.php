<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UbsRepository;
use App\Entities\Ubs;
use App\Validators\UbsValidator;

/**
 * Class UbsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UbsRepositoryEloquent extends BaseRepository implements UbsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ubs::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UbsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
