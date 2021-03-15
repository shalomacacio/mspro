<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AgendaRepository;
use App\Entities\Agenda;
use App\Validators\AgendaValidator;

/**
 * Class AgendaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AgendaRepositoryEloquent extends BaseRepository implements AgendaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Agenda::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AgendaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
