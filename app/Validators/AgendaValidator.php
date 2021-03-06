<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AgendaValidator.
 *
 * @package namespace App\Validators;
 */
class AgendaValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'campanha_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];

    protected $attributes = [
        'campanha_id' => 'campanha',
    ];
}
