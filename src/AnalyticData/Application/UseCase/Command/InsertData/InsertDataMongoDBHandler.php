<?php

namespace App\AnalyticData\Application\UseCase\Command\InsertData;

use App\AnalyticData\Domain\Service\DataDocumentMaker;
use App\Shared\Application\Command\CommandHandlerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class InsertDataMongoDBHandler implements CommandHandlerInterface
{
    public function __construct(private readonly DataDocumentMaker $documentMaker)
    {
    }

    public function __invoke(InsertDataMongoCommand $insertDataCommand): void
    {
        $insertData = $insertDataCommand->insertDataDTO;
        $userInfo = $insertDataCommand->userInfoDTO;
        $this->documentMaker->makeDataDocument(
            firstName: $insertData->firstName,
            lastName: $insertData->lastName,
            phoneNumber: $insertData->getFirstPhone(),
            phoneNumber2: $insertData->getSecondPhone(),
            country: $userInfo->country,
            ip: $userInfo->ip
        );
    }
}