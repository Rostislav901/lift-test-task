<?php

namespace App\AnalyticData\Domain\Service;

use App\AnalyticData\Domain\Factory\DataDocumentFactory;
use App\AnalyticData\Domain\Repository\DataDocumentRepositoryInterface;
use App\AnalyticData\Infrastructure\Repository\DataDocumentRepository;

class DataDocumentMaker
{
    public function __construct(
        private readonly DataDocumentRepository $dataDocumentRepository,
        private readonly DataDocumentFactory $dataDocumentFactory)
    {
    }


    public function makeDataDocument(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        string $phoneNumber2,
        string $country,
        string $ip
    ): void
    {
         $dataDocument = $this->dataDocumentFactory
             ->create($firstName, $lastName, $phoneNumber, $phoneNumber2,$country,$ip);

         $this->dataDocumentRepository->add($dataDocument);
    }
}