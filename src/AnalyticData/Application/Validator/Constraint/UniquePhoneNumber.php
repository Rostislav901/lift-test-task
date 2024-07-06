<?php

namespace App\AnalyticData\Application\Validator\Constraint;

use App\AnalyticData\Application\Validator\Validator\UniquePhoneNumberValidator;
use Symfony\Component\Validator\Constraint;
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class UniquePhoneNumber extends Constraint
{
    public string $message = 'Phone numbers must be unique.';
    public function validatedBy(): string
    {
        return UniquePhoneNumberValidator::class;
    }
}