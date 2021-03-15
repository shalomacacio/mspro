<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CampanhaRepository;
use App\Entities\Campanha;
use App\Validators\CampanhaValidator;

/**
 * Class CampanhaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CampanhaRepositoryEloquent extends BaseRepository implements CampanhaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Campanha::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CampanhaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
