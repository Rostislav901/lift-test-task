<?php

namespace App\AnalyticData\Domain\Factory;

use App\AnalyticData\Domain\Aggregate\Data\Document\Data;
use App\AnalyticData\Domain\Aggregate\Data\Specification\PhoneNumberFormatSpecification;
use App\AnalyticData\Domain\Aggregate\Data\ValueObject\PhoneNumber;

class DataDocumentFactory
{
    public function __construct(private readonly PhoneNumberFormatSpecification $formatSpecification)
    {
    }

    public function create(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        string $phoneNumber2,
        string $country,
        string $ip
    ): Data
    {
        return (new Data())
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setPhoneNumber(new PhoneNumber($phoneNumber,$this->formatSpecification))
            ->setPhoneNumber2(new PhoneNumber($phoneNumber2,$this->formatSpecification))
            ->setCountry($country)
            ->setIp($ip);
    }
}