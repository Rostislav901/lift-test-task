<?php

namespace App\AnalyticData\Domain\Factory;

use App\AnalyticData\Domain\Aggregate\Data\Entity\Data;
use App\AnalyticData\Domain\Aggregate\Data\Specification\PhoneNumberFormatSpecification;
use App\AnalyticData\Domain\Aggregate\Data\ValueObject\PhoneNumber;

class DataEntityFactory
{

    public function __construct(private readonly PhoneNumberFormatSpecification $formatSpecification)
    {
    }

    public function create(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        string $phoneNumber2
    ): Data
    {
        return new Data(
            $firstName, $lastName,
            new PhoneNumber($phoneNumber,$this->formatSpecification),
            new PhoneNumber($phoneNumber2,$this->formatSpecification));
    }
}