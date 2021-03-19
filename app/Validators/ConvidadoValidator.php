<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ConvidadoValidator.
 *
 * @package namespace App\Validators;
 */
class ConvidadoValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
