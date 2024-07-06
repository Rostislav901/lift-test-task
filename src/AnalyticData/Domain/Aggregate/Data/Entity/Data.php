<?php

namespace App\AnalyticData\Domain\Aggregate\Data\Entity;

use App\AnalyticData\Domain\Aggregate\Data\ValueObject\PhoneNumber;
use App\AnalyticData\Domain\Repository\DataEntityRepositoryInterface;
use App\Shared\Domain\Service\UlidService;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: DataEntityRepositoryInterface::class)]
#[ORM\Table(name: 'data')]
class Data
{
    #[ORM\Id()]
    #[ORM\Column(type: 'string', length: 26)]
    private string $ulid;
    #[ORM\Id()]
    #[ORM\Column(type: 'string', length: 64)]
    private string $firstName;
    #[ORM\Column(type: 'string', length: 64)]
    private string $lastName;
    #[ORM\Embedded(class: PhoneNumber::class)]
    private PhoneNumber $phoneNumber;
    #[ORM\Embedded(class: PhoneNumber::class)]
    private PhoneNumber $phoneNumber2;
    public function __construct(
        string $firstName, string $lastName,
        PhoneNumber $phoneNumber, PhoneNumber $phoneNumber2)
    {
        $this->ulid = UlidService::generate();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->phoneNumber2 = $phoneNumber2;
    }

    public function getUlid(): string
    {
        return $this->ulid;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhoneNumber(): PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function getPhoneNumber2(): PhoneNumber
    {
        return $this->phoneNumber2;
    }

}