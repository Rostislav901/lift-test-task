<?php

namespace App\AnalyticData\Infrastructure\Repository;

use App\AnalyticData\Domain\Aggregate\Data\Document\Data;
use App\AnalyticData\Domain\Repository\DataDocumentRepositoryInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Doctrine\ODM\MongoDB\UnitOfWork;

class DataDocumentRepository extends DocumentRepository implements DataDocumentRepositoryInterface
{
    public function __construct(DocumentManager $dm, UnitOfWork $uow)
    {
        parent::__construct($dm, $uow, new ClassMetadata(Data::class));
    }

    /**
     * @throws MongoDBException
     */
    public function add(Data $data): void
    {
        $this->dm->persist($data);

        $this->dm->flush();
    }
}
