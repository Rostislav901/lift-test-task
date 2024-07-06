<?php

namespace App\AnalyticData\Domain\Repository;

use App\AnalyticData\Domain\Aggregate\Data\Entity\Data;
use App\AnalyticData\Domain\Exception\DataNotFoundException;

interface DataEntityRepositoryInterface
{
    public function add(Data $data): void;

    /**
     * @return Data[]
     */
    /**
     * @throws DataNotFoundException
     */
    public function getAllDataSortByFirstName(): array;
}