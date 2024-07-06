<?php

namespace App\AnalyticData\Domain\Aggregate\Data\Exception;

class PhoneNumberFormatException extends \RuntimeException
{
     public function __construct()
     {
         parent::__construct("Not a valid phone number format");
     }
}