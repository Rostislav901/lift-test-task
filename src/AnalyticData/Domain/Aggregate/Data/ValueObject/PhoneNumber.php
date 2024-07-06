<?php

namespace App\AnalyticData\Domain\Aggregate\Data\ValueObject;

use App\AnalyticData\Domain\Aggregate\Data\Specification\PhoneNumberFormatSpecification;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Embeddable]
class PhoneNumber
{
    #[ORM\Column(type: 'string', length: 20)]
    private readonly string $phoneNumber;

    public function __construct(string $phoneNumber, PhoneNumberFormatSpecification $formatSpecification)
    {
         $formatSpecification->formatSatisfy($phoneNumber);

         $this->phoneNumber = $phoneNumber;
    }

    public function value(): string
    {
        return  $this->phoneNumber;
    }
}