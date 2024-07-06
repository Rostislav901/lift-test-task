<?php

namespace App\AnalyticData\Infrastructure\Http\Controller;

use App\AnalyticData\Application\DTO\InsertDataDTO;
use App\AnalyticData\Application\DTO\ResponseDataDTO;
use App\AnalyticData\Application\UseCase\Command\InsertData\InsertDataMongoCommand;
use App\AnalyticData\Application\UseCase\Command\InsertData\InsertDataPostgreSQLCommand;
use App\AnalyticData\Application\UseCase\Query\GetDataSortByFirstName\GetDataSortByFirstNameQuery;
use App\AnalyticData\Infrastructure\Http\Service\UserInfoService;
use App\Shared\Application\Attribute\RequestBody;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DataController extends AbstractController
{

    public function __construct(
        private readonly QueryBusInterface $queryBus,
        private readonly UserInfoService $infoService,
        private readonly CommandBusInterface $commandBus)
    {
    }

    #[Route(path: '/api/v1/insert/data',methods: ['POST'])]
    public function insertData(#[RequestBody] InsertDataDTO $insertDataDTO): Response
    {
         $insertPostgeSQLCommand = new InsertDataPostgreSQLCommand(
             $insertDataDTO->firstName,
             $insertDataDTO->lastName,
             $insertDataDTO->getFirstPhone(),
             $insertDataDTO->getSecondPhone()
         );

         $insertMongoCommand = new InsertDataMongoCommand($insertDataDTO, $this->infoService->userInfo());

         $this->commandBus->execute($insertPostgeSQLCommand);
         $this->commandBus->execute($insertMongoCommand);

         return $this->json('success');
    }

    #[Route(path: '/api/v1/get/data/sort-by-firstname',methods: ['GET'])]
    public function getDataSortByFirstName(): Response
    {
        $getQuery = new GetDataSortByFirstNameQuery();

        /**
         * @var ResponseDataDTO $result
         */
        $result =  $this->queryBus->execute($getQuery);

        return $this->json($result);
    }
}