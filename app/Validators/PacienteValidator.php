<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PacienteValidator.
 *
 * @package namespace App\Validators;
 */
class PacienteValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome'=> 'required',
            'cpf'=> 'required|unique:pacientes',
            'dt_nascimento'=> 'required',
            'sexo'=> 'required',
            'celular'=> 'required|min:11|max:11',
            'bairro_id' => 'required',
            'rua' => 'required',
            'num' => 'required',
            'ubs_id' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome'=> 'required',
            'cpf'=> 'required|unique:pacientes,id,:id',
            'dt_nascimento'=> 'required',
            'sexo'=> 'required',
            'celular'=> 'required',
            'bairro_id' => 'required',
            'rua' => 'required',
            'num' => 'required',
            'ubs_id' => 'required',
        ],
    ];

    
    protected $attributes = [
        'dt_nascimento' => 'data nascimento',
        'bairro_id' => 'bairro',
        'ubs_id' => 'ubs',
        'num' => 'numero',
    ];
}
