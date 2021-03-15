<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PacienteRepository;
use App\Entities\Paciente;
use App\Validators\PacienteValidator;

/**
 * Class PacienteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PacienteRepositoryEloquent extends BaseRepository implements PacienteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Paciente::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PacienteValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
