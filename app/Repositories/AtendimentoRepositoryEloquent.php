<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AtendimentoRepository;
use App\Entities\Atendimento;
use App\Validators\AtendimentoValidator;

/**
 * Class AtendimentoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AtendimentoRepositoryEloquent extends BaseRepository implements AtendimentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Atendimento::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AtendimentoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
