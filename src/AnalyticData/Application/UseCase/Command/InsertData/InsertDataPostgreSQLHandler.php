<?php

namespace App\AnalyticData\Application\UseCase\Command\InsertData;

use App\AnalyticData\Domain\Service\DataEntityMaker;
use App\Shared\Application\Command\CommandHandlerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class InsertDataPostgreSQLHandler implements CommandHandlerInterface
{
    public function __construct(private readonly DataEntityMaker $dataEntityMaker)
    {
    }

    public function __invoke(InsertDataPostgreSQLCommand $insertDataCommand): void
    {

        $this->dataEntityMaker->makeDataEntity(
            firstName: $insertDataCommand->firstName,
            lastName: $insertDataCommand->lastName,
            phoneNumber: $insertDataCommand->phoneNumber,
            phoneNumber2: $insertDataCommand->phoneNumber2,
        );
    }
}