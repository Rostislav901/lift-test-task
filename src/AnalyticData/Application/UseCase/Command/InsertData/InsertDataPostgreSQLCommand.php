<?php

namespace App\AnalyticData\Application\UseCase\Command\InsertData;

use App\AnalyticData\Application\DTO\InsertDataDTO;
use App\Shared\Application\Command\CommandInterface;

class InsertDataPostgreSQLCommand implements CommandInterface
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $phoneNumber,
        public string $phoneNumber2,
    )
    {
    }
}