<?php

namespace App\AnalyticData\Application\UseCase\Query\GetDataSortByFirstName;

use App\AnalyticData\Application\DTO\ResponseDataDTO;
use App\AnalyticData\Application\Transformer\DataTransformer;
use App\AnalyticData\Domain\Repository\DataEntityRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

class GetDataSortByFirstNameQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private readonly DataEntityRepositoryInterface $dataEntityRepository,
        private readonly DataTransformer $dataTransformer)
    {
    }

    public function __invoke(GetDataSortByFirstNameQuery $query): ResponseDataDTO
    {
        $entities = $this->dataEntityRepository->getAllDataSortByFirstName();

        $dtoArray = $this->dataTransformer->fromEntityListToItemDTOList($entities);

        return new ResponseDataDTO($dtoArray);
    }
}