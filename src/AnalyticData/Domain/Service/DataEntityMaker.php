<?php

namespace App\AnalyticData\Domain\Service;

use App\AnalyticData\Domain\Factory\DataEntityFactory;
use App\AnalyticData\Domain\Repository\DataEntityRepositoryInterface;

class DataEntityMaker
{
    public function __construct(
        private readonly DataEntityRepositoryInterface $dataEntityRepository,
        private readonly DataEntityFactory $factory)
    {
    }


    public function makeDataEntity(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        string $phoneNumber2
    ): void
    {
        $dataEntity = $this->factory->create($firstName, $lastName, $phoneNumber, $phoneNumber2);
        $this->dataEntityRepository->add($dataEntity);
    }
}