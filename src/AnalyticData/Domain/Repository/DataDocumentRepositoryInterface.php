<?php

namespace App\AnalyticData\Domain\Repository;

use App\AnalyticData\Domain\Aggregate\Data\Document\Data;

interface DataDocumentRepositoryInterface
{

    public function add(Data $data): void;
}