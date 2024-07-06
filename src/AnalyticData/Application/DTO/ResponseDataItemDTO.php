<?php

namespace App\AnalyticData\Application\DTO;

class ResponseDataItemDTO
{
    public string $firstName;
    public string $lastName;

    public array $phoneNumbers;

    /**
     * @param string[] $phoneNumbers
     */
    public function __construct(string $firstName, string $lastName, array $phoneNumbers)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumbers = $phoneNumbers;
    }

}