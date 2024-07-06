<?php

namespace App\AnalyticData\Domain\Aggregate\Data\Exception;

class PhoneNumberTypeException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Expected PhoneNumber");
    }
}