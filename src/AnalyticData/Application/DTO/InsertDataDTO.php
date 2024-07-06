<?php

namespace App\AnalyticData\Application\DTO;
use App\AnalyticData\Application\Validator\Constraint\UniquePhoneNumber;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class InsertDataDTO
{
    #[NotBlank(message: "First name should not be blank.")]
    #[Length(
        min: 2,
        max: 50,
        minMessage: "First name must be at least {{ limit }} characters long",
        maxMessage: "First name cannot be longer than {{ limit }} characters"
    )]
    #[Regex(
        pattern: "/^[a-zA-Z-' ]*$/",
        message: "First name can only contain letters, hyphens, apostrophes, and spaces"
    )]
    public string $firstName;

    #[NotBlank(message: "Last name should not be blank.")]
    #[Length(
        min: 2,
        max: 50,
        minMessage: "Last name must be at least {{ limit }} characters long",
        maxMessage: "Last name cannot be longer than {{ limit }} characters"
    )]
    #[Regex(
        pattern: "/^[a-zA-Z-' ]*$/",
        message: "Last name can only contain letters, hyphens, apostrophes, and spaces"
    )]
    public string $lastName;

    /**
     * @var string[]
     */

    #[Count(
        min: 2,
        max: 2,
        exactMessage: "You must provide exactly two phone numbers."
    )]
    #[All([
        new NotBlank(message: "Phone number should not be blank."),
        new Regex(
            pattern: "/^\+380\d{9}$/",
            message: "Phone number must start with +380 and be followed by 9 digits."
        )
    ])]
    #[UniquePhoneNumber]
    public array $phoneNumbers;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param array $phoneNumbers
     */
    public function __construct(string $firstName, string $lastName, array $phoneNumbers)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumbers = $phoneNumbers;
    }


    public function getFirstPhone():string
    {
        return $this->phoneNumbers[0];
    }

    public function getSecondPhone():string
    {
        return $this->phoneNumbers[1];
    }
}