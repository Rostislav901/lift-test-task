<?php

namespace App\AnalyticData\Application\UseCase\Command\InsertData;

use App\AnalyticData\Application\DTO\InsertDataDTO;
use App\AnalyticData\Application\DTO\UserInfoDTO;
use App\Shared\Application\Command\CommandInterface;

class InsertDataMongoCommand implements CommandInterface
{
    public function __construct(public readonly InsertDataDTO $insertDataDTO, public readonly UserInfoDTO $userInfoDTO)
    {
    }
}