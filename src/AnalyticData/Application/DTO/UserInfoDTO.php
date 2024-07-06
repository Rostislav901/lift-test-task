<?php

namespace App\AnalyticData\Application\DTO;

use Symfony\Component\Validator\Constraints\Ip;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserInfoDTO
{
    public function __construct(
        #[NotBlank]
        #[Length(min: 2, max: 100)]
        #[Regex(pattern: '/^[A-Za-z\s]+$/',message: 'Country should only contain letters.')]
        public string $country,
        #[NotBlank]
        #[Ip]
        public string $ip)
    {
    }
}