<?php

namespace App\AnalyticData\Domain\Aggregate\Data\Specification;

use App\AnalyticData\Domain\Aggregate\Data\Exception\PhoneNumberFormatException;

class PhoneNumberFormatSpecification
{

     public function formatSatisfy(string $phoneNumber): void
     {
         if (!preg_match('/^\+380\d{9}$/', $phoneNumber)) {
             throw new PhoneNumberFormatException();
         }
     }
}