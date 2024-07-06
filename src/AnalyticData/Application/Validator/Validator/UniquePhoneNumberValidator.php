<?php

namespace App\AnalyticData\Application\Validator\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniquePhoneNumberValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!is_array($value)) {
            return;
        }

        if (count($value) !== count(array_unique($value))) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    public function validatedBy(): string
    {
        return  static::class;
    }
}