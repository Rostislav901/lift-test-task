<?php

namespace App\AnalyticData\Infrastructure\Repository;

use App\AnalyticData\Domain\Aggregate\Data\Entity\Data;
use App\AnalyticData\Domain\Exception\DataNotFoundException;
use App\AnalyticData\Domain\Repository\DataEntityRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class DataEntityRepository extends EntityRepository implements DataEntityRepositoryInterface
{
    private readonly EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $class = new ClassMetadata(Data::class);

        parent::__construct($em, $class);
    }


    public function add(Data $data): void
    {
        $this->em->persist($data);
        $this->em->flush();
    }

    public function getAllDataSortByFirstName(): array
    {
        $res = $this->findBy([], ['firstName' => 'ASC']);

        return $res === [] ? throw new DataNotFoundException() : $res;
    }
}