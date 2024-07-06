<?php

namespace App\AnalyticData\Domain\Aggregate\Data\Document;

use App\AnalyticData\Domain\Aggregate\Data\ValueObject\PhoneNumber;
use App\AnalyticData\Infrastructure\Repository\DataDocumentRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'data', repositoryClass: DataDocumentRepository::class)]
class Data
{
    #[ODM\Id]
    private string $id;
    #[ODM\Field(type: 'string')]
    private string $firstName;

    #[ODM\Field(type: 'string')]
    private string $lastName;
    #[ODM\Field(type: 'string')]
    private string $phoneNumber;
    #[ODM\Field(type: 'string')]
    private string $phoneNumber2;

    #[ODM\Field(type: 'string')]
    private string $country;

    #[ODM\Field(type: 'string')]
    private string $ip;
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(PhoneNumber $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber->value();

        return $this;
    }

    public function getPhoneNumber2(): string
    {
        return $this->phoneNumber2;
    }

    public function setPhoneNumber2(PhoneNumber $phoneNumber2): static
    {
        $this->phoneNumber2 = $phoneNumber2->value();

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }



}